<?php

namespace App\Http\Controllers;

use Src\Service\OrderService;
use Src\Service\UserService;

class UserController extends Controller
{

    public function __construct(
        protected UserService $userService,
        protected OrderService $orderService
    ) {}


    public function me()
    {
        return $this->userService->profile(1);
    }


    public function userOrders($user_id)
    {

        return $this->orderService->userOrderCount($user_id);
    }
}
