<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Beban_ekuivalensis extends Model
{

    public $id;
    public $id_mahasiswa;

    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("beban_ekuivalensi");
        $this->belongsTo(
            'id_mahasiswa',
            'App\Ekuivalensi\Model\Mahasiswas',
            'id',
            [
                'alias' => 'mahasiswas',
                'reusable' => true
            ]
        );
    }

    public function getSource()
    {
        return 'beban_ekuivalensi';
    }
}
