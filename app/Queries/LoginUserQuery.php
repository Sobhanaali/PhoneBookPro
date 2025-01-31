<?php

namespace App\Queries;

class LoginUserQuery
{
    private $username_or_mobile;
    private $password;

    public function __construct($username_or_mobile , $password)
    {
        $this->username_or_mobile = $username_or_mobile;
        $this->password = $password;
    }

    public function getUsernameOrMobile()
    {
        return $this->username_or_mobile;
    }
    
    public function getPassword()
    {
        return $this->password;
    }

    protected $validationRules = [
        'username_or_mobile' => 'required|min_length[3]|max_length[50]',
        'password'      => 'required',
    ];

    public function validate()
    {
        $validation = \Config\Services::validation();

        $validation->setRules($this->validationRules);

        $data = [
            'username_or_mobile' => $this->username_or_mobile,
            'password' => $this->password
        ];

        if (!$validation->run($data)) {
            session()->setFlashdata('errors', $validation->getErrors());
            return false; 
        }

        // $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        return true;
    }
}