<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;

class MahasiswaController extends Controller
{
    public function onConstruct()
    {
        $this->auth = $this->session->get("auth");
        if($this->auth['table'] == "Mahasiswa")
        {
            $this->view->auth = $this->auth;
        }
        else
        {
            $this->response->redirect('auth/login');
        }
    }

    public function indexAction()
    {
        $this->view->title = "Mahasiswa Merdeka";
    }
}
