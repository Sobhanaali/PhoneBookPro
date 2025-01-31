<?php

namespace App\Repositories;

use App\Commands\CreateUserCommand;

interface Repository
{
    public function create(CreateUserCommand $command);
}