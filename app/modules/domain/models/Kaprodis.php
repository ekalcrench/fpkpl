<?php

namespace App\Ekuivalensi\Model;

use Phalcon\Mvc\Model;

class Kaprodis extends Model
{

    public $id;
    public $nip;
    public $password;
    public $nama;

    public function initialize()
    {
        $this->setSchema("fpkpl");
        $this->setSource("kaprodi");
    }

    public function getSource()
    {
        return 'kaprodi';
    }

}
