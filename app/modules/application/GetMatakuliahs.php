<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Matakuliahs;

class GetMatakuliahs
{
    public $matakuliahLama;
    public $matakuliahBaru;

    public function __construct()
    {
        $this->matakuliahLama = Matakuliahs::find("kurikulum='2014'");
        $this->matakuliahBaru = Matakuliahs::find("kurikulum='2018'");
    }
}
