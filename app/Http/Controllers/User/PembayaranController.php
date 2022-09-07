<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Program;
use Midtrans\Snap;
use Midtrans\Config;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Program $program)
    {
        return view('user.pembayaran.donasi', compact('program'));
    }


    public function bayar(PembayaranRequest $request)
    {
        $program = Program::select('nama_program', 'id_program')->where('id_program', $request->id_program)->get();
        if (!count($program)) {
            return response()->json([
                'pesan' => 'Pembayaran gagal dilakukan'
            ], 404);
        }

        $program = $program[0];

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Uncomment for production environment
        // Config::$isProduction = true;

        // Uncomment to enable sanitization
        // Config::$isSanitized = true;

        // Uncomment to enable 3D-Secure
        // Config::$is3ds = true;

        // Optional
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
            // Get Snap Payment Page URL
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return [
                'token' => $snapToken,
                'status' => 200
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'token' => '',
                'status' => 500
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
