<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('pembayaran');
    }

    public function checkout(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-5ZxQNkSBGuvQ6MXa3IDUjpj5';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return $snapToken;

        return view('checkout', compact('snapToken'));
    }

    public function notification(Request $request)
    {
        // Proses notifikasi pembayaran dari Midtrans
        // Perlu disesuaikan dengan logika dan data pembayaran Anda

        // Contoh:
        $transaction = $request->input('transaction_id');
        $status = $request->input('transaction_status');
        $fraud = $request->input('fraud_status');

        // Lakukan logika dan pemrosesan berdasarkan status pembayaran dan penipuan (fraud)

        return response()->json(['status' => 'OK']);
    }
}
