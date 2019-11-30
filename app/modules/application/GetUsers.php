<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Mahasiswas;
use App\Ekuivalensi\Model\Dosens;
use App\Ekuivalensi\Model\Kaprodis;

class GetUsers
{
    private $mahasiswa;
    private $dosen;
    private $kaprodi;
    public $username;
    public $user;

    public function __construct($users, $username)
    {
        $this->username = $username;
        if($users == "Kaprodi")
        {
            $this->kaprodi = new Kaprodis();
            $this->user = $this->kaprodi->findFirst("nip='$this->username'");
        }
        elseif($users == "Dosen")
        {
            $this->dosen = new Dosens();
            $this->user = $this->dosen->findFirst("nip='$this->username'");
        }
        elseif($users == "Mahasiswa")
        {
            $this->mahasiswa = new Mahasiswas();
            $this->user = $this->mahasiswa->findFirst("nrp='$this->username'");
        }
    }
}
