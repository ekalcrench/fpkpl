<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Dosens extends Model
{

    public $id;
    public $nip;
    public $password;
    public $nama;

    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("dosen");
    }

    public function getSource()
    {
        return 'dosen';
    }

}
