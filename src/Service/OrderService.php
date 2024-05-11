<?php

namespace Src\Service;


use Src\Interface\OrderCountInterface;

class OrderService
{

    public function __construct(
        protected OrderCountInterface $repository
    ) {}

    public function userOrderCount($user_id)
    {
        return $this->repository->getAllUserOrderCount($user_id);
    }

}
