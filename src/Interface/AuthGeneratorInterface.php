<?php

namespace Src\Interface;

interface AuthGeneratorInterface
{

    public function createAccessToken();

    public function createRefreshToken();

}
