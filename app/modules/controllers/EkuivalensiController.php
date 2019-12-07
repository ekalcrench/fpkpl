<?php

namespace App\Ekuivalensi\Controller;

use Phalcon\Mvc\Controller;
use App\Ekuivalensi\Application\GetMatakuliahs;
use App\Ekuivalensi\Application\GetMahasiswas;
use App\Ekuivalensi\Application\GetBebanEkuivalensis;
use App\Ekuivalensi\Application\GetMatakuliahAmbils;
use App\Ekuivalensi\Application\RelasiMatakuliah;
use App\Ekuivalensi\Application\BebanEkuivalensi;
use App\Ekuivalensi\Application\ProsesEkuivalensi;

class EkuivalensiController extends Controller
{
    // Untuk mahasiswa
    public function indexAction()
    {
        $this->auth = $this->session->get("auth");
        if($this->auth['table'] == "Mahasiswa")
        {
            $this->view->auth = $this->auth;
        }
        else
        {
            $this->response->redirect('index/home');
        }
        $this->view->title = "Ekuivalensi";
        $matakuliah = new GetMatakuliahAmbils($this->auth['id']);
        $this->view->matkulAmbil = $matakuliah->matkulAmbil;
        $prosesEkuiv = new ProsesEkuivalensi();
        $prosesEkuiv->getProses($this->auth['id']);
        $this->view->allproses = $prosesEkuiv->proses;

    }

    // Untuk mahasiswa jika ingin mengganti status dari ambil, hapus, ataupun bebas
    public function statusAction($id_matkul_ambil, $status)
    {
        $proses = new ProsesEkuivalensi();
        if($proses->createProses($id_matkul_ambil, $status))
        {
            $this->flashSession->success("Data Berhasil Dibuat");
        }
        else
        {
            $this->flashSession->error("Data Sudah Dipermanen");
        }
        $this->response->redirect("ekuivalensi");
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
        if($this->auth['table'] == "Dosen" or $this->auth['table'] == "Kaprodi")
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

    // Menghapus beban ekuivalensi (Hak akses hanya dosen, berdasarkan UseCase)
    public function deleteBebanAction($id_beban)
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
        $bebanEkuiv = new BebanEkuivalensi();
        $bebanEkuiv->deleteBeban($id_beban);
        $this->flashSession->success('Data Berhasil Dihapus');
        $this->response->redirect('ekuivalensi/beban');
    }

    // Memproses mahasiswa yang terkena ekuivalensi
    public function prosesBebanAction($id_mahasiswa)
    {
        $prosesEkuiv = new ProsesEkuivalensi();
        $prosesEkuiv->getProses($id_mahasiswa);
        $this->view->allproses = $prosesEkuiv->proses;
        $this->view->id_mahasiswa = $id_mahasiswa;
        $this->view->title = "Persetujuan Mahasiswa";
    }

    // Mengganti nilai permanen pada proses ekuivalensi
    public function permanenAction($id_mahasiswa, $id, $permanen)
    {
        $proses = new ProsesEkuivalensi();
        $proses->updatePermanen($id, $permanen);
        $this->response->redirect("ekuivalensi/prosesBeban/$id_mahasiswa");
    }
}
