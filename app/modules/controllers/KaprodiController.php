<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;

class KaprodiController extends Controller
{
    public function onConstruct()
    {
        $this->auth = $this->session->get("auth");
        if($this->auth['table'] == "Kaprodi")
        {
            $this->view->auth = $this->auth;
        }
        else
        {
            header("location:auth/login");
            exit();
        }
    }

    public function indexAction()
    {

    }

}

