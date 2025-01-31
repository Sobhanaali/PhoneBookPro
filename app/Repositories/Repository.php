<?php

namespace App\Repositories;

use App\Commands\CreateUserCommand;
use App\Queries\FindUserQuery;
use App\Queries\LoginUserQuery;

interface Repository
{
    public function create(CreateUserCommand $command);
    public function login(LoginUserQuery $query);
    public function find(FindUserQuery $query);
}