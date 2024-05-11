<?php

namespace Src\Interface;

use App\Models\User;

interface UserRepositoryInterface
{

    public function getUserById(int $id) :User;


}
