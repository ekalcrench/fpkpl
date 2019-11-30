<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Beban_ekuivalensis;

class GetBebanEkuivalensis
{
    public $bebanEkuiv = array();

    public function __construct()
    {
        // Dikarenakan model relationship hanya dapat digunakan dengan method findFirst, maka kita hitung jumlah data
        $jumlah = count(Beban_ekuivalensis::find());
        for ($x = 1; $x <= $jumlah; $x++) {
            // Setiap data row dimasukan kedalam array bebanEkuiv
            $this->bebanEkuiv[$x] = Beban_ekuivalensis::findFirst($x);
        } 
    }
}
