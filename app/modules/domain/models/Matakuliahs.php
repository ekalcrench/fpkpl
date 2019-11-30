<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Matakuliahs extends Model
{

    public $id;
    public $kode;
    public $nama;
    public $sks;
    public $semester;
    public $kurikulum;

    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("matakuliah");
    }

    public function getSource()
    {
        return 'matakuliah';
    }
}
