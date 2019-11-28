<?php

namespace App\Ekuivalensi\Application;

use Phalcon\Http\Response;

class HttpFiles
{
    public function download($filename)
    {
        $response = new Response();
        $path = APP_PATH . $filename;
        $filetype = filetype($path);
        $filesize = filesize($path);   
        $response->setHeader("Cache-Control", 'must-revalidate, post-check=0, pre-check=0');
        $response->setHeader("Content-Description", 'File Download');
        $response->setHeader("Content-Type", $filetype);
        $response->setHeader("Content-Length", $filesize);
        $response->setFileToSend($path, str_replace(" ","-",$filename), true);
        $response->send();
    }

    public function upload($files)
    {
        foreach ($files as $file) 
        {
            $path = APP_PATH . '/' . md5(uniqid(rand(), true)) . '-' . strtolower($file->getName());
            $file->moveTo($path);
        }
    }
}
