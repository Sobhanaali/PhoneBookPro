<?php

namespace App\Controllers;

use App\Commands\Command;
use App\Commands\CreateHandler;
use App\Commands\DeleteHandler;
use App\Commands\UpdateHandler;
use App\Repositories\ContactRepository;
use CodeIgniter\Controller;

class ContactController extends Controller
{
    public $contactRepository;

    public function __construct()
    {
        $this->contactRepository = new ContactRepository();
    }

    public function store()
    {
        $createCommand = new Command([
            'user_id' => $this->request->getPost('user_id'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'mobile' => $this->request->getPost('mobile')
        ]);

        $createHandler = new CreateHandler($this->contactRepository);

        if(!$createHandler->handle($createCommand)){
            return redirect()->to('/dashboard')->withInput();
        }

        return redirect()->to('/dashboard');
    }

    public function update()
    {
        $updateCommand = new Command([
            'id' => $this->request->getPost('id'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'mobile' => $this->request->getPost('mobile'),
        ]);
        $updateHandler = new UpdateHandler($this->contactRepository);
        $updateHandler->handle($updateCommand);
        
        return redirect()->to('/dashboard');
        
    }

    public function delete()
    {
        $deleteCommand = new Command([
            'id' => $this->request->getPost('id')
        ]);
        $deleteHandler = new DeleteHandler($this->contactRepository);
        $deleteHandler->handle($deleteCommand);

        return redirect()->to('/dashboard');
    }
}