<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    [
       'App\Ekuivalensi\Application' => APP_PATH . '/modules/application',
       'App\Ekuivalensi\Auth'        => APP_PATH . '/modules/auth',
       'App\Ekuivalensi\Model'       => APP_PATH . '/modules/domain/models',
       'App\Ekuivalensi\Controller'  => APP_PATH . '/modules/controllers',
    ]
);

$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();
