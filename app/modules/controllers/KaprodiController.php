<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;
use App\Ekuivalensi\Application\GetMatakuliahs;

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
            $this->response->redirect('auth/login');
        }
    }

    public function indexAction()
    {
        $this->view->title = "Kaprodi";
    }

    public function matakuliahAction()
    {
        $matakuliah = new GetMatakuliahs();
        $this->view->matakuliahLama = $matakuliah->matakuliahLama;
        $this->view->matakuliahBaru = $matakuliah->matakuliahBaru;
        $this->view->title = "Data Matakuliah";
    }

    public function unduhAction()
    {

    }

    public function unggahAction()
    {
        
    }
}

