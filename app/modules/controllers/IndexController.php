<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    private $auth;

    public function onConstruct()
    {
        $this->auth = $this->session->get("auth");
    }

    public function indexAction()
    {
        $this->view->title = "Welcome";
        if($this->auth)
        {
            $this->response->redirect('index/home');
        }
    }

    public function homeAction()
    {
        if($this->auth)
        {
            $this->view->auth = $this->auth;
            $this->view->title = "Home";
        }
        else
        {
            $this->response->redirect('index/home');
        }
    }
}
