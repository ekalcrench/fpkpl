<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;
use App\Ekuivalensi\Application\GetMatakuliahs;
use App\Ekuivalensi\Application\HttpFiles;

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
        if ($this->request->isPost()) 
        {
            $filename = $this->request->getPost('filename');
            $file = new HttpFiles();
            $file->download($filename);
            die();
        }
        else
        {
           return "SORRY THE PAGE DOES NOT EXIST";
        }
    }

    public function unggahAction()
    {
        if ($this->request->isPost()) 
        {
            $file = new HttpFiles();
            if($file->upload($this->request->getUploadedFiles()))
            {
                $this->flashSession->success('File Berhasil Diunggah');
                $this->response->redirect('kaprodi/matakuliah');
            }
            else
            {
                $this->flashSession->error('Pilih File Terlebih Dahulu');
                $this->response->redirect('kaprodi/matakuliah');
            }
        }
        else
        {
            return "SORRY THE PAGE DOES NOT EXIST";
        }
    }
}
