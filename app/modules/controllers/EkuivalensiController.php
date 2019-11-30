<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;
use App\Ekuivalensi\Application\GetMatakuliahs;
use App\Ekuivalensi\Application\GetMahasiswas;
use App\Ekuivalensi\Application\GetBebanEkuivalensis;
use App\Ekuivalensi\Application\RelasiMatakuliah;
use App\Ekuivalensi\Application\BebanEkuivalensi;

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
                $ekuivalensi->createRelasi();
                $this->flashSession->success('Data Berhasil DImasukan');
                $this->response->redirect('ekuivalensi/relasi');
            }
            else
            {
                $this->flashSession->error('Data Sudah Ada');
                $this->response->redirect('ekuivalensi/relasi');
            }
        }
        else
        {
            return "SORRY THE PAGE DOES NOT EXIST";
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

    // Untuk create mahasiswa beban 
    public function createBebanAction()
    {
        if ($this->request->isPost()) 
        {
            $id_mahasiswa = $this->request->getPost('mahasiswa');
            $bebanEkuiv = new BebanEkuivalensi();
            if($bebanEkuiv->checkBeban($id_mahasiswa))
            {
                $bebanEkuiv->createBeban($id_mahasiswa);
                $this->flashSession->success('Data Berhasil DImasukan');
                $this->response->redirect('ekuivalensi/beban');
            }
            else
            {
                $this->flashSession->error('Data Sudah Ada');
                $this->response->redirect('ekuivalensi/beban');
            }
        }
        else
        {
            return "SORRY THE PAGE DOES NOT EXIST";
        }
    }

    // Menghapus beban ekuivalensi
    public function deleteBebanAction($id_beban)
    {
        $bebanEkuiv = new BebanEkuivalensi();
        $bebanEkuiv->deleteBeban($id_beban);
        $this->flashSession->success('Data Berhasil Dihapus');
        $this->response->redirect('ekuivalensi/beban');
    }
}
