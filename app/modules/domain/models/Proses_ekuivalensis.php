<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Proses_ekuivalensis extends Model
{

    public $id;
    public $id_matkul_ambil;
    public $status;
    public $permanen;

    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("proses_ekuivalensi");
        $this->belongsTo(
            'id_matkul_ambil',
            'App\Ekuivalensi\Model\Matakuliah_ambils',
            'id',
            [
                'alias' => 'matakuliah_ambils',
                'reusable' => true
            ]
        );
    }

    public function getSource()
    {
        return 'proses_ekuivalensi';
    }
}
