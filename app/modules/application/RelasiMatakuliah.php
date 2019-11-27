<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Ekuivalensis;

class RelasiMatakuliah
{
    private $idMatkulBaru;
    private $relasi;
    private $idMatkulLama;
    private $ekuivalensi;

    public function __construct($idMatkulLama, $relasi, $idMatkulBaru)
    {
        $this->idMatkulLama = $idMatkulLama;
        $this->relasi = $relasi;
        $this->idMatkulBaru = $idMatkulBaru;
        $this->ekuivalensi = new Ekuivalensis();
    }

    public function checkRelasi()
    {
        $this->ekuivalensi = Ekuivalensis::find("matakuliah_lama='$this->idMatkulLama'");
        if(count($this->ekuivalensi))
        {
            foreach($this->ekuivalensi as $ekui)
            {
                if($ekui->relasi == "AND") return 0;
                elseif($ekui->matakuliah_lama == $this->idMatkulLama && $ekui->matakuliah_baru == $this->idMatkulBaru) return 0;
            }
            return 1;
        }
        else return 1;
    }

    public function createRelasi(Ekuivalensis $ekuivalensi)
    {
        $this->ekuivalensi = $ekuivalensi;
        $this->ekuivalensi->matakuliah_lama = $this->idMatkulLama;
        $this->ekuivalensi->relasi = $this->relasi;
        $this->ekuivalensi->matakuliah_baru = $this->idMatkulBaru;
        return $this->ekuivalensi->create();
    }
}