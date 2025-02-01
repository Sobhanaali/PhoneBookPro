<?php

namespace App\Repositories;

use App\Commands\CreateUserCommand;
use App\Models\UserModel;
use App\Queries\FindUserQuery;
use App\Queries\LoginUserQuery;

class UserRepository implements Repository
{
    private $userModel;

    protected $validationRules = [
        'username'      => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'first_name'    => 'required|min_length[3]|max_length[50]',
        'last_name'     => 'required|min_length[3]|max_length[50]',
        'mobile'        => 'required|is_unique[users.mobile]|min_length[10]|max_length[15]',
        'password'      => 'required',
        'confirm_password' => 'required|matches[password]',
    ];

    public function validate($command)
    {
        $validation = \Config\Services::validation();

        $validation->setRules($this->validationRules);

        $data = [
            'username'         => $command->get('username'),
            'mobile'           => $command->get('mobile'),
            'first_name'       => $command->get('first_name'),
            'last_name'        => $command->get('last_name'),
            'password'         => $command->get('password'),
            'confirm_password' => $command->get('confirm_password')
        ];

        if (!$validation->run($data)) {
            session()->setFlashdata('errors', $validation->getErrors());
            return false; 
        }

        return true;
    }

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function create($command)
    {
        if($this->validate($command)){
            $this->userModel->save([
                'username' => $command->get('username'),
                'mobile' => $command->get('mobile'),
                'first_name' => $command->get('first_name'),
                'last_name' => $command->get('last_name'),
                'password' => password_hash($command->get('password'), PASSWORD_BCRYPT)
            ]);
            return true;
        } else {
            return false;
        }
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

    public function find($query)
    {
        $user = $this->userModel->find($query->getId());

        return $user;
    }
}