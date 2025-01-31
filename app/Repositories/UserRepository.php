<?php

namespace App\Repositories;

use App\Commands\CreateUserCommand;
use App\Models\UserModel;
use App\Queries\FindUserQuery;
use App\Queries\LoginUserQuery;

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

    public function login(LoginUserQuery $query)
    {
        $identifier = $query->getUsernameOrMobile();
        $user = $this->userModel
        ->where('username', $identifier)
        ->orWhere('mobile', $identifier)
        ->get()
        ->getRow();

        if (!$user) {
            return null;
        }

        if (!password_verify($query->getPassword(), $user->password)) {
            return null;
        }

        return $user;
    }

    public function find(FindUserQuery $query)
    {
        $user = $this->userModel->find($query->getId());

        return $user;
    }
}