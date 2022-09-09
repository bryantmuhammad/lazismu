<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Program;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\DB;
use App\Models\Pemasukan;
use Exception;
use App\Jobs\DonasiJob;

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

        $program = $program->first();

        try {
            DB::transaction(function () use ($request) {
                Pemasukan::create([
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

        $response =  $this->snap($request, $program);

        return $response;
    }

    public function snap($request, $program)
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        $item_details = [[
            'id'        => $program->id_program,
            'price'     => $request->jumlah_pemasukan,
            'quantity'  => 1,
            'name'      => substr($program->nama_program, 0, 15)
        ]];
        $transaction_details = array(
            'order_id'      => rand(),
            'gross_amount'  => $request->jumlah_pemasukan,
        );

        $customer_details = array(
            'first_name'       => $request->nama_donatur,
            'email'            => $request->email,

        );
        // Fill SNAP API parameter
        $params = array(
            'transaction_details'   => $transaction_details,
            'customer_details'      => $customer_details,
            'item_details'          => $item_details,
        );

        try {
            // dispatch(new DonasiJob([
            //     'email'     => $request->email,
            //     'pemasukan' => $request->pemasukan,
            //     'nama_program' => $program->nama_program
            // ]));
            // Get Snap Payment Page URL
            $snapToken = Snap::getSnapToken($params);

            return response()->json([
                'token'  => $snapToken,
                'status' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'pesan'  => 'Pembayaran gagal dilakukan',
                'status' => 404
            ], 404);
        }
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
        return $payment->order_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
