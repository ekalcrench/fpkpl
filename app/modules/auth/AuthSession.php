<?php

namespace App\Ekuivalensi\Auth;

use App\Ekuivalensi\Model\Mahasiswas;
use App\Ekuivalensi\Model\Dosens;
use App\Ekuivalensi\Model\Kaprodis;
use Phalcon\DiInterface;

class AuthSession
{
    private $di;
    public $session;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
        $this->session = $di->getShared('session');
    }

    public function mahasiswaLogin(Mahasiswas $user, $users)
    {
        $this->session->set('auth', array(
            'isLog' => 'Y',
            'id' => $user->id,
            'id_pengguna' => $user->nrp,
            'table' => $users
        ));
    }

    public function dosenLogin(Dosens $user, $users)
    {
        $this->session->set('auth', array(
            'isLog' => 'Y',
            'id' => $user->id,
            'id_pengguna' => $user->nip,
            'table' => $users
        ));
    }

    public function kaprodiLogin(Kaprodis $user, $users)
    {
        $this->session->set('auth', array(
            'isLog' => 'Y',
            'id' => $user->id,
            'id_pengguna' => $user->nip,
            'table' => $users
        ));
    }
}   
