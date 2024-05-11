<?php

namespace App\Http\Controllers;

use Src\Service\OrderService;

class UserController extends Controller
{

    public function __construct(
      protected OrderService $service
    ) {}

    public function userOrders($user_id)
    {

        return $this->service->userOrderCount($user_id);
    }
}
