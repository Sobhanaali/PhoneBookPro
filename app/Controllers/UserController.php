<?php

namespace App\Controllers;

use App\Commands\Command;
use App\Commands\DeleteHandler;
use App\Commands\UpdateHandler;
use App\Queries\FindHandler;
use App\Queries\FindQuery;
use App\Repositories\UserRepository;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function edit($id)
    {
        $findQuery = new FindQuery($id);
        $findHandler = new FindHandler($this->repository);
        $user = $findHandler->handle($findQuery);
        return view('edit_profile' , [
            'user' => $user
        ]);
    }

    public function update()
    {
        $updateCommand = new Command([
            'id' => $this->request->getPost('id'),
            'username' => $this->request->getPost('username'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'mobile' => $this->request->getPost('mobile'),
        ]);
        $updateHandler = new UpdateHandler($this->repository);
        $updateHandler->handle($updateCommand);
        
        return redirect()->to('/dashboard');
    }

    public function delete()
    {
        $deleteCommand = new Command([
            'id' => $this->request->getPost('id')
        ]);
        $deleteHandler = new DeleteHandler($this->repository);
        $deleteHandler->handle($deleteCommand);

        return redirect()->to('/login');
    }
}