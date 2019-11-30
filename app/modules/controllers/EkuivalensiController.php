<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;
use App\Ekuivalensi\Application\GetMatakuliahs;
use App\Ekuivalensi\Application\GetMahasiswas;
use App\Ekuivalensi\Application\GetBebanEkuivalensis;
use App\Ekuivalensi\Application\RelasiMatakuliah;
use App\Ekuivalensi\Model\Ekuivalensis;
use App\Ekuivalensi\Model\Beban_ekuivalensis;

class EkuivalensiController extends Controller
{
    public function indexAction()
    {
        $this->view->title = "Ekuivalensi";
    }

    // Untuk mengatur relasi matakuliah lama dengan matakuliah baru
    public function relasiAction()
    {  
        $this->auth = $this->session->get("auth");
        if($this->auth['table'] == "Dosen")
        {
            $this->view->auth = $this->auth;
        }
        else
        {
            $this->response->redirect('index/home');
        }
        $matakuliah = new GetMatakuliahs();
        $this->view->matakuliahLama = $matakuliah->matakuliahLama;
        $this->view->matakuliahBaru = $matakuliah->matakuliahBaru;
        $this->view->title = "Relasi Matakuliah";
        
    }

    // Create action dari relasi matakuliah
    public function createRelasiAction()
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

    // Untuk mengatur beban ekuivalensi
    public function bebanAction()
    {
        $this->auth = $this->session->get("auth");
        if($this->auth['table'] == "Dosen")
        {
            $this->view->auth = $this->auth;
        }
        else
        {
            $this->response->redirect('index/home');
        }
        $this->view->title = "Beban Ekuivalensi";
        $mahasiswas = new GetMahasiswas();
        $mahasiswaBeban = new GetBebanEkuivalensis();
        $this->view->mahasiswas = $mahasiswas->mahasiswa;
        $this->view->mahasiswaBeban = $mahasiswaBeban->bebanEkuiv;
    }
}
