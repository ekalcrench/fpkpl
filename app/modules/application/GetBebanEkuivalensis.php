<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Beban_ekuivalensis;

class GetBebanEkuivalensis
{
    public $bebanEkuiv = array();

    public function __construct()
    {        
        // Dikarenakan kita tidak mengatahui id yang ada di database maka cari sendiri
        $bebanAll = Beban_ekuivalensis::find();
        $x = 0;
        foreach($bebanAll as $beban)
        {
            $this->bebanEkuiv[$x] = Beban_ekuivalensis::findFirst($beban->id);
            $x = $x + 1;
        }
    }
}
