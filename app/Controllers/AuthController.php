<?php

namespace App\Controllers;

use App\Commands\Command;
use App\Commands\CreateHandler;
use App\Queries\LoginUserHandler;
use App\Queries\LoginUserQuery;
use App\Repositories\UserRepository;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class AuthController extends Controller
{
    protected $userRepository;
    
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $findUserQuery = new LoginUserQuery(
            $this->request->getPost('username_or_mobile'),
            $this->request->getPost('password')
        );

        if (!$findUserQuery->validate()){
            return redirect()->to('/login')->withInput();
        }

        $findQueryHandler = new LoginUserHandler($this->userRepository);
        $user = $findQueryHandler->handle($findUserQuery);
        
        if ($user) {
            session()->set([
                'user_id' => $user->id,
                'username' => $user->username,
                'mobile' => $user->mobile,
                'is_logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('loginError', 'Username or mobile is incorrect.');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerPost()
    {
        $createCommand =  new Command([
            'username' => $this->request->getPost('username'),
            'mobile' => $this->request->getPost('mobile'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'password' => $this->request->getPost('password'),
            'confirm_password' => $this->request->getPost('confirm_password'),
        ]);

        $createHandler = new CreateHandler($this->userRepository);
        
        if(!$createHandler->handle($createCommand)){
            return redirect()->to('/register')->withInput();
        }

        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
