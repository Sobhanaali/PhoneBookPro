<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository implements Repository
{
    private $contactModel;

    protected $validationRules = [
        'first_name'    => 'required|min_length[3]|max_length[50]',
        'last_name'     => 'required|min_length[3]|max_length[50]',
        'mobile'        => 'required|is_unique[contacts.mobile]|min_length[10]|max_length[15]',
    ];

    public function validate($command)
    {
        $validation = \Config\Services::validation();

        $validation->setRules($this->validationRules);

        $data = [
            'first_name'       => $command->get('first_name'),
            'last_name'        => $command->get('last_name'),
            'mobile'           => $command->get('mobile'),
        ];

        if (!$validation->run($data)) {
            session()->setFlashdata('errors', $validation->getErrors());
            return false; 
        }

        return true;
    }

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function create($command)
    {
        if($this->validate($command)){
            $this->contactModel->save([
                'user_id' => $command->get('user_id'),
                'first_name' => $command->get('first_name'),
                'last_name' => $command->get('last_name'),
                'mobile' => $command->get('mobile'),
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function findAll($query)
    {
        $contacts = $this->contactModel->where('user_id' , $query->getId())->findAll();

        return $contacts;
    }

    public function update($command)
    {
        $this->contactModel->update($command->get('id') ,[
            'first_name' => $command->get('first_name'),
            'last_name' => $command->get('last_name'),
            'mobile' => $command->get('mobile'),
        ]);
    }
}