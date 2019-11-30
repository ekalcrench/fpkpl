<?php

namespace App\Ekuivalensi\Application;

use Phalcon\Http\Response;
use App\Ekuivalensi\Application\SimpleXLSX;
use App\Ekuivalensi\Model\Matakuliahs;

class HttpFiles
{
    public function download($filename)
    {
        $response = new Response();
        $path = APP_PATH . '/' . $filename;
        $filetype = filetype($path);
        $filesize = filesize($path);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setHeader('Content-Type', $filetype);
        $response->setHeader('Content-Transfer-Encoding', 'Binary');
        $response->setHeader('Content-Length', $filesize); 
        $response->setFileToSend($path, true);
        $response->send();
    }

    public function upload($files)
    {
        $bool = 0;
        foreach ($files as $file) 
        {
            // Cari tau dulu filenya kosong atau tidak
            if($file->getName()) 
            {
                $path = APP_PATH . '/' . md5(uniqid(rand(), true)) . '-' . strtolower($file->getName());
                $file->moveTo($path);
                // Make SimpleXLSX buat membaca file excel, dari MIT
                $data = new SimpleXLSX($path);
                $i = 0;
                foreach ($data->rows() as $row) 
                {
                    if($i != 0) 
                    {
                        // Kalau matakuliah belum ada di tabel, baru insert
                        if(!Matakuliahs::findFirst("kode='$row[0]'"))
                        {
                            $matakuliah = new Matakuliahs();
                            $matakuliah->kode = $row[0];
                            $matakuliah->nama = $row[1];
                            $matakuliah->sks = $row[2];
                            $matakuliah->semester = $row[3];
                            $matakuliah->kurikulum = '2018';
                            $matakuliah->create();
                        }
                    }      
                    $i++;
                }
                $bool = 1;
            }
        }
        return $bool;
    }
}
