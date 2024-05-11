<?php

namespace Src\Service;


use App\Models\User;
use Src\Interface\OrderCountInterface;
use Src\Interface\UserRepositoryInterface;

class UserService
{

    public function __construct(
        protected UserRepositoryInterface $repository,
        protected OrderCountInterface     $orderRepository,
    ) {}

    /**
     * @param $id
     * @return User
     */
    public function profile($id): User
    {

        $user = $this->repository->getUserById($id);

        $user->order_count = $this->orderRepository->getAllUserOrderCount($user->id);

        return $user;
    }


}
