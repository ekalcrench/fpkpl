<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Ekuivalensis;

class RelasiMatakuliah
{
    private $idMatkulBaru;
    private $relasi;
    private $idMatkulLama;

    public function __construct($idMatkulLama, $relasi, $idMatkulBaru)
    {
        $this->idMatkulLama = $idMatkulLama;
        $this->relasi = $relasi;
        $this->idMatkulBaru = $idMatkulBaru;
    }

    public function checkRelasi()
    {
        $ekuiLama = Ekuivalensis::find("matakuliah_lama='$this->idMatkulLama'");
        $ekuiBaru = Ekuivalensis::find("matakuliah_baru='$this->idMatkulBaru'");
        // Hubungan antara ekuiLama dengan ekuiBaru yaitu 2:1 atau 1:2
        if(count($ekuiLama) == 1)
        {
            foreach($ekuiLama as $ekui)
            {
                if($ekui->relasi == "AND") return 0;
            }
        }
        if(count($ekuiBaru) == 1)
        {
            foreach($ekuiBaru as $ekui)
            {
                if($ekui->relasi == "AND") return 0;
            }
        }
        if(count($ekuiLama) == 0)
        {
            // Kalo dua-duanya null ya masuk
            if(count($ekuiBaru) == 0) return 1;
            // Kalo matkul baru nya ada, cek dulu matkul lama yang berhubungan dengan matkul baru tersebut
            else if(count($ekuiBaru) == 1)
            {
                foreach($ekuiBaru as $ekui)
                {
                    $cekLama = Ekuivalensis::find("matakuliah_lama='$ekui->matakuliah_lama'");
                    if(count($cekLama) <= 1) return 1;
                    else return 0;
                }
            }
            // Kalo matkul baru nya ada 2 ya sekip
            else return 0;
        }
        if(count($ekuiBaru) == 0)
        {
            // Kalo dua-duanya null ya masuk
            if(count($ekuiLama) == 0) return 1;
            // Kalo matkul baru nya ada, cek dulu matkul lama yang berhubungan dengan matkul baru tersebut
            else if(count($ekuiLama) == 1)
            {
                foreach($ekuiLama as $ekui)
                {
                    $cekBaru = Ekuivalensis::find("matakuliah_baru='$ekui->matakuliah_baru'");
                    if(count($cekBaru) <= 1) return 1;
                    else return 0;
                }
            }
            // Kalo matkul baru nya ada 2 ya sekip
            else return 0;
        }
    }

    public function createRelasi()
    {
        $ekuivalensi = new Ekuivalensis();
        $ekuivalensi->matakuliah_lama = $this->idMatkulLama;
        $ekuivalensi->relasi = $this->relasi;
        $ekuivalensi->matakuliah_baru = $this->idMatkulBaru;
        $ekuivalensi->create();
    }
}
