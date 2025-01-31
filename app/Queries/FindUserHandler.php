<?php

namespace App\Queries;

use App\Repositories\UserRepository;

class FindUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindUserQuery $query)
    {
        return $this->userRepository->find($query);
    }
}