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
        $this->hasOne(
            'id',
            'App\Ekuivalensi\Model\Beban_ekuivalensis',
            'id_mahasiswa',
            [
                'alias' => 'beban_ekuivalensis',
                'reusable' => true
            ]
        );
    }

    public function getSource()
    {
        return 'mahasiswa';
    }

}
