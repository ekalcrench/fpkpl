<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;
use App\Ekuivalensi\Application\GetUsers;

class AuthController extends Controller
{
    public function loginAction()
    {
        $this->auth = $this->session->get("auth");
        if($this->auth)
        {
            $this->response->redirect('index/home');
        }
        $this->view->title = "Login";
        if ($this->request->isPost()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            // Mahasiswa, Dosen, atau Kaprodi
            $users = $this->request->getPost('users');
            $user = new GetUsers($users, $username);
            if ($user->user)
            {
                if($password==$user->user->password)
                {
                    $auth = $this->di->getShared('auth');
                    if($users == "Kaprodi")
                    {
                        $auth->kaprodiLogin($user->user, $users);
                    }
                    elseif($users == "Dosen")
                    {
                        $auth->dosenLogin($user->user, $users);
                    }
                    elseif($users == "Mahasiswa")
                    {
                        $auth->mahasiswaLogin($user->user, $users);
                    }
                    $this->response->redirect('index/home');
                }
            }
            else
            {
                $this->response->redirect('auth/login');
            }
        }
    }

    public function logoutAction()
    {
      $this->session->destroy();
      $this->response->redirect('/');
    }
}
