<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Service\UserService;

class AuthController extends Controller
{

    public function __construct(
        protected UserService $userService
    ) {}

    public function me()
    {
        return $this->userService->profile(1);
    }


}
