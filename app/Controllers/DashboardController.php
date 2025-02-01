<?php

namespace App\Controllers;

use App\Queries\FindAllHandler;
use App\Queries\FindAllQuery;
use App\Queries\FindHandler;
use App\Queries\FindQuery;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use CodeIgniter\Controller;

class DashboardController extends Controller
{

    public $userRepository;
    public $contactRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->contactRepository = new ContactRepository();
    }

    public function index()
    {
        $id = session()->get('user_id');

        $findQuery = new FindQuery($id);
        $findHandler = new FindHandler($this->userRepository);

        $user = $findHandler->handle($findQuery);

        $findAllQuery = new FindAllQuery($id);
        $findAllHandler = new FindAllHandler($this->contactRepository);
        $contacts = $findAllHandler->handle($findAllQuery);

        return view('dashboard' , [
            'user' => $user,
            'contacts' => $contacts
        ]);
    }
}