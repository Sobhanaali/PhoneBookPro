<?php

namespace App\Queries;

use App\Repositories\UserRepository;

class LoginUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(LoginUserQuery $query)
    {
        return $this->userRepository->login($query);
    }

}