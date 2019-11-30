<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Ekuivalensis extends Model
{

    public $id;
    public $matakuliah_lama;
    public $relasi;
    public $matakuliah_baru;

    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("ekuivalensi");
    }

    public function getSource()
    {
        return 'ekuivalensi';
    }
}
