<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Matakuliah_ambils extends Model
{
    public $id;
    public $id_matakuliah;
    public $id_mahasiswa;
    public $nilai;
    
    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("matakuliah_ambil");
        $this->belongsTo(
            'id_matakuliah',
            'App\Ekuivalensi\Model\Matakuliahs',
            'id',
            [
                'alias' => 'matakuliahs',
                'reusable' => true
            ]
        );
        $this->belongsTo(
            'id_mahasiswa',
            'App\Ekuivalensi\Model\Mahasiswas',
            'id',
            [
                'alias' => 'mahasiswas',
                'reusable' => true
            ]
        );
        $this->hasMany(
            'id',
            'App\Ekuivalensi\Model\Proses_ekuivalensis',
            'id_matkul_ambil',
            [
                'alias' => 'proses_ekuivalensis',
                'reusable' => true
            ]
        );
    }

    public function getSource()
    {
        return 'matakuliah_ambil';
    }
}
