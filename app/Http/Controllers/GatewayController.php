<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayController extends Controller
{
    public function redirect($invoice)
    {

        $data = [
            'merchant' => '8XBRXV-66GK4D-PBD5VV-5C3GVC',
            'amount' => $invoice->amount / 10,
            'callbackUrl' => 'https://api.iwco.io/api/gateway/callback/?type=point&uuid=' . $invoice->token,
            'returnUrl' => 'https://api.iwco.io/api/gateway/callback/?type=point&uuid='  . $invoice->token,
        ];

        $result = Http::withHeaders([
            'header' => 'Content-Type: application/json',
        ])->post('https://api.oxapay.com/merchants/request', $data);


        if ($result->status() === 200) {

            $response = $result->json();

            if ($response['result'] === 100) {

                return response([
                    'status' => true,
                    'message' => 'connecting to gateway...',
                    'payload' => [
                        'action' => $response['payLink'],
                        'method' => 'GET',
                    ]
                ]);
            }
        } else {
            return response()->json(['status' => false, 'message' => $result]);
        }
    }

    public function verify(Request $request)
    {
        // update invoice status
        // render event
    }
}
