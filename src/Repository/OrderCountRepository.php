<?php

namespace Src\Repository;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Src\Interface\OrderCountInterface;

class OrderCountRepository implements OrderCountInterface
{


    public function getAllUserOrderCount($user_id): int
    {
        return Order::query()->where('user_id', $user_id)->count();
    }
}
