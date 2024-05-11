<?php

namespace Src\Repository;

use App\Models\User;
use Src\Interface\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return User
     */
    public function getUserById($id) : User
    {

        return $this->model->find($id);

    }


}
