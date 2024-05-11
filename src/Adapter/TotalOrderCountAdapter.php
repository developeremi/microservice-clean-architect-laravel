<?php


namespace Src\Adapter;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Src\Interface\OrderCountInterface;

class TotalOrderCountAdapter implements OrderCountInterface
{


    public function getAllUserOrderCount($user_id): int
    {

        // rest or rpc call to fetch user order count
        $response = Http::get('http://localhost:8080/api/users/' .$user_id. '/orders');

        return $response->json();
    }
}
