<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Midtrans\Snap;
use Midtrans\Config;

class SnapServices
{
    public function snap($request, $program, $idPemasukan): JsonResponse
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        $item_details = [[
            'id'        => $program->id_program,
            'price'     => $request->jumlah_pemasukan,
            'quantity'  => 1,
            'name'      => substr($program->nama_program, 0, 15)
        ]];
        $transaction_details = array(
            'order_id'      => $idPemasukan,
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
            $snapToken = Snap::getSnapToken($params);

            return response()->json([
                'token'  => $snapToken,
                'status' => 200,
                'order_id' => $idPemasukan
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'pesan'  => 'Pembayaran gagal dilakukan',
                'status' => 404,
                'order_id' => $idPemasukan
            ], 404);
        }
    }
}
