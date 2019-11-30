<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Mahasiswas;

class GetMahasiswas
{
    public $mahasiswa;

    public function __construct()
    {
        $this->mahasiswa = Mahasiswas::find();
    }
}
