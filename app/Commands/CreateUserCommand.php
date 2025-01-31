<?php

namespace App\Commands;

use App\Models\UserModel;
use Config\Services;
use InvalidArgumentException;

class CreateUserCommand
{
    private $username;
    private $mobile;
    private $first_name;
    private $last_name;
    private $password;
    private $confirm_password;

    public function __construct($username, $mobile, $first_name, $last_name, $password, $confirm_password) {
        $this->username = $username;
        $this->mobile = $mobile;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

    public function getUserName() {
        return $this->username;
    }

    public function getMobile() {
        return $this->mobile;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getConfirmPassword() {
        return $this->confirm_password;
    }

    protected $validationRules = [
        'username'      => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'first_name'    => 'required|min_length[3]|max_length[50]',
        'last_name'     => 'required|min_length[3]|max_length[50]',
        'mobile'        => 'required|is_unique[users.mobile]|min_length[10]|max_length[15]',
        'password'      => 'required',
        'confirm_password' => 'required|matches[password]',
    ];

    public function validate()
    {
        $validation = \Config\Services::validation();

        $validation->setRules($this->validationRules);

        $data = [
            'username'         => $this->username,
            'mobile'           => $this->mobile,
            'first_name'       => $this->first_name,
            'last_name'        => $this->last_name,
            'password'         => $this->password,
            'confirm_password' => $this->confirm_password,
        ];

        if (!$validation->run($data)) {
            session()->setFlashdata('errors', $validation->getErrors());
            return false; 
        }

        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        return true;
    }


}