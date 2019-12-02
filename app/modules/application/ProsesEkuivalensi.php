<?php

namespace App\Ekuivalensi\Application;

use App\Ekuivalensi\Model\Proses_ekuivalensis;
use App\Ekuivalensi\Model\Matakuliah_ambils;
 

class ProsesEkuivalensi
{
    // public $id_matkul_ambil = array();
    // public $status = array();
    public $proses = array();
    public function createProses($id_matkul_ambil, $status){
        $proses_update = Proses_ekuivalensis::findFirst("id_matkul_ambil = '$id_matkul_ambil'");
        if($proses_update){
            $proses_update->status = $status;
            $proses_update->save();
        }
        else{
            $proses = new Proses_ekuivalensis();
            $proses->id_matkul_ambil = $id_matkul_ambil;
            $proses->status = $status;
            $proses->permanen = "NO";

            $proses->create();
        }
        

    }

    public function getProses($id_mahasiswa){
        $allproses = Proses_ekuivalensis::find();
        $x = 0;
        foreach ($allproses as $proses){
            $temp = Proses_ekuivalensis::findFirst($proses->id);
            if($temp->matakuliah_ambils->id_mahasiswa == $id_mahasiswa){

                $this->proses[$x] = $temp;
                $x = $x + 1;
            }
        }

    }
}
