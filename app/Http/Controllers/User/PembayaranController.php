<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use App\Models\Pemasukan;
use Exception;
use App\Jobs\DonasiJob;
use Illuminate\Support\Str;
use App\Services\SnapServices;

class PembayaranController extends Controller
{
    public function index(Program $program)
    {
        return view('user.pembayaran.donasi', compact('program'));
    }

    public function bayar(PembayaranRequest $request)
    {
        if ($request->has('hidden_name'))  $request->nama_donatur = "Hamba Allah";

        // If someone change id with inspect element
        $program = Program::select('nama_program', 'id_program')->where('id_program', $request->id_program)->get();

        if (!count($program)) {
            // Return 404 if program not found
            return response()->json([
                'pesan' => 'Pembayaran gagal dilakukan'
            ], 404);
        }

        $program        = $program->first();
        $idPemasukan    = Str::random(10);
        try {
            DB::transaction(function () use ($request, $idPemasukan) {
                Pemasukan::create([
                    'id_pemasukan'      => $idPemasukan,
                    'id_program'        => $request->id_program,
                    'nama_donatur'      => $request->nama_donatur,
                    'catatan'           => $request->catatan,
                    'jumlah_pemasukan'  => $request->jumlah_pemasukan,
                    'email'             => $request->email,
                    'status'            => 0
                ]);
            });
        } catch (Exception $e) {
            return response()->json([
                'pesan' => 'Pembayaran gagal dilakukan'
            ], 404);
        }

        return (new SnapServices)->snap($request, $program, $idPemasukan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = json_decode($request->payment);
        try {
            DB::transaction(function () use ($request, $payment) {
                Pembayaran::create([
                    'id_pemasukan'      => $payment->order_id,
                    'jenis_pembayaran'  => $payment->payment_type,
                    'va_number'         => $payment->va_numbers[0]->va_number,
                    'jenis_bank'        => $payment->va_numbers[0]->bank,
                    'pdf'               => $payment->pdf_url
                ]);
            });
        } catch (\Exception $e) {
            return response()->json([
                'pesan' => 'Silahkan coba beberapa saat lagi'
            ], 424);
        }

        $program = Program::select('nama_program')->where('id_program', $request->id_program)->first();
        dispatch(new DonasiJob([
            'email'         => $request->email,
            'pemasukan'     => $request->jumlah_pemasukan,
            'nama_program'  => $program->nama_program,
            'link'          => $payment->pdf_url
        ]));

        return response()->json([
            'pesan'         => 'Donasi berhasil dilakukan',
            'id_pemasukan'  => $payment->order_id
        ], 200);
    }

    public function caramembayar(Pemasukan $pemasukan)
    {
        if ($pemasukan->status) return abort(404);
        return view('user.invoice.invoice', [
            'pemasukan' => $pemasukan->load('program', 'pembayaran')
        ]);
    }
}
