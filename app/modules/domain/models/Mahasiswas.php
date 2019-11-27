<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Mahasiswas extends Model
{

    public $id;
    public $nrp;
    public $nama;
    public $email;
    public $password;

    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("mahasiswa");
    }

    public function getSource()
    {
        return 'mahasiswa';
    }

}
