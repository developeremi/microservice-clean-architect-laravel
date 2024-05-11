<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{


    /**
     * @return void
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    public function subInfo()
    {
        $response = \Illuminate\Support\Facades\Http::asForm()
            ->post("https://panel.venxv.com:8443/api/admin/token", [
                'username' => 'Venadmin',
                'password' => 'Venadmin'
            ]);


        if ($response->successful()) {


            $info = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => 'bearer ' . $response->json()['access_token']
            ])->get("https://panel.venxv.com:8443/api/user/mehrdad.masoumi517@gmail.com");

            dd($info->json());
        }
    }
}
