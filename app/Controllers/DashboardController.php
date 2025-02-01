<?php

namespace App\Controllers;

use App\Queries\FindHandler;
use App\Queries\FindQuery;
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

        $findQuery = new FindQuery($id);
        $findHandler = new FindHandler($this->userRepository);

        $user = $findHandler->handle($findQuery);

        return view('dashboard' , [
            'user' => $user
        ]);
    }
}