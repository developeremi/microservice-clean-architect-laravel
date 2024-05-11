<?php

namespace Src\Interface;

interface OrderCountInterface
{

    public function getAllUserOrderCount($user_id) :int;

}
