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
        $this->hasMany(
            'id',
            'App\Ekuivalensi\Model\Matakuliah_ambils',
            'id_matakuliah',
            [
                'alias' => 'matakuliah_ambils',
                'reusable' => true
            ]
        );
    }

    public function getSource()
    {
        return 'matakuliah';
    }
}
