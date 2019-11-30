<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Beban_ekuivalensis;

class BebanEkuivalensi
{
    public function checkBeban($id_mahasiswa)
    {
        $bebanEkuiv = Beban_ekuivalensis::find("id_mahasiswa='$id_mahasiswa'");
        if(count($bebanEkuiv)) return 0;
        else return 1;
    }

    public function createBeban($id_mahasiswa)
    {
        $bebanEkuiv = new Beban_ekuivalensis();
        $bebanEkuiv->id_mahasiswa = $id_mahasiswa;
        $bebanEkuiv->create();
    }

    public function deleteBeban($id_beban)
    {
        $bebanEkuiv = Beban_ekuivalensis::findFirst("id='$id_beban'");
        $bebanEkuiv->delete();
    }
}
