<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Matakuliah_ambils extends Model
{

    public $id;
    public $id_matakuliah;
    public $id_mahasiswa;

    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("matakuliah_ambil");
    }

    public function getSource()
    {
        return 'matakuliah_ambil';
    }
}
