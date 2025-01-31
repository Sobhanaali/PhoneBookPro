<?php

namespace App\Repositories;

use App\Commands\CreateUserCommand;
use App\Models\UserModel;

class UserRepository implements Repository
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function create(CreateUserCommand $command)
    {
        $create = $this->userModel->save([
            'username' => $command->getUserName(),
            'mobile' => $command->getMobile(),
            'first_name' => $command->getFirstName(),
            'last_name' => $command->getLastName(),
            'password' => $command->getPassword()
        ]);
        
    }
}