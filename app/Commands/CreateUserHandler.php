<?php

namespace App\Commands;

use App\Repositories\UserRepository;

class CreateUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUserCommand $command)
    {
        $this->userRepository->create($command);
    }
}