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
            header("location:index/home");
            exit();
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
            header("location:../auth/login");
            exit();
        }
    }

}

