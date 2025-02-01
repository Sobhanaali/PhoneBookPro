<?php

namespace App\Controllers;

use APP\Commands\CreateCommand;
use App\Commands\CreateContactCommand;
use App\Commands\CreateContactHandler;
use App\Commands\CreateHandler;
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
        // echo '<pre>';
        // var_dump($this->request->getPost());
        // echo '</pre>';
        // exit();
        // $createContactCommand = new CreateContactCommand(
        //     $this->request->getPost('user_id'),
        //     $this->request->getPost('first_name'),
        //     $this->request->getPost('last_name'),
        //     $this->request->getPost('mobile'),
        // );

        // if (!$createContactCommand->validate()){
        //     return redirect()->back()->withInput();
        // }

        // $createContactHandler = new CreateContactHandler($this->contactRepository);
        // $createContactHandler->handle($createContactCommand);


        $createCommand = new CreateCommand([
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
}