<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;
use App\Ekuivalensi\Application\GetMatakuliahs;
use App\Ekuivalensi\Application\RelasiMatakuliah;
use App\Ekuivalensi\Model\Ekuivalensis;

class EkuivalensiController extends Controller
{
    public function indexAction()
    {
        $this->view->title = "Ekuivalensi";
    }

    public function relasiAction()
    {  
        $matakuliah = new GetMatakuliahs();
        $this->view->matakuliahLama = $matakuliah->matakuliahLama;
        $this->view->matakuliahBaru = $matakuliah->matakuliahBaru;
        $this->view->title = "Relasi Matakuliah";
        
    }

    public function bebanAction()
    {

    }

    public function createAction()
    {
        if ($this->request->isPost()) 
        {
            $idMatkulLama = $this->request->getPost('matkulLama');
            $idMatkulBaru = $this->request->getPost('matkulBaru');
            $relasi = $this->request->getPost('relasi');    
            $ekuivalensi = new RelasiMatakuliah($idMatkulLama, $relasi, $idMatkulBaru);
            if($ekuivalensi->checkRelasi())
            {
                if($ekuivalensi->createRelasi(new Ekuivalensis()))
                {
                    $this->flashSession->success('Data Berhasil DImasukan');
                    $this->response->redirect('ekuivalensi/relasi');
                }
            }
            else
            {
                $this->flashSession->error('Data Sudah Ada');
                $this->response->redirect('ekuivalensi/relasi');
            }
        }
    }
}
