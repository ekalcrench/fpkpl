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
        $ekuivalensi = Ekuivalensis::find("matakuliah_lama='$this->idMatkulLama'");
        if(count($ekuivalensi))
        {
            foreach($ekuivalensi as $ekui)
            {
                if($ekui->relasi == "AND") return 0;
                elseif($ekui->matakuliah_lama == $this->idMatkulLama && $ekui->matakuliah_baru == $this->idMatkulBaru) return 0;
            }
            return 1;
        }
        else return 1;
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