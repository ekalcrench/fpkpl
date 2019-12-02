<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Matakuliah_ambils;

class GetMatakuliahAmbils
{
    public $matkulAmbil = array();

    public function __construct($id)
    {
        $matkulAll = Matakuliah_ambils::find("id_mahasiswa='$id'");
        $x = 0;
        foreach($matkulAll as $matkul)
        {
            $this->matkulAmbil[$x] = Matakuliah_ambils::findFirst($matkul->id);
            $x = $x + 1;
        }
    }
}
