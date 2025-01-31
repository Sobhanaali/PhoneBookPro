<?php

namespace App\Controllers;

use App\Queries\FindUserHandler;
use App\Queries\FindUserQuery;
use App\Repositories\UserRepository;
use CodeIgniter\Controller;

class DashboardController extends Controller
{

    public $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index()
    {
        $id = session()->get('user_id');


        $findUserQuery = new FindUserQuery($id);
        $findUserHandler = new FindUserHandler($this->userRepository);

        $user = $findUserHandler->handle($findUserQuery);

        return view('dashboard' , [
            'user' => $user
        ]);
    }
}