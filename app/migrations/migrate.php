<?php

defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

if (!function_exists('env')) {
    // Use composer autoloader to load vendor classes
 require_once BASE_PATH . '/vendor/autoload.php';

 /**
  * Environment variables
  */
 $dotenv = new Dotenv\Dotenv(BASE_PATH . '/');
 $dotenv->load();
}

$host = getenv('127.0.0.1');
$user = getenv('root');
$pass = getenv('');
$dbname = getenv('fpkpl');

try {
    $db = new PDO("mysql:host=$host;CHARSET=utf8;COLLATE=utf8_unicode_ci", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE DATABASE IF NOT EXISTS `$dbname`; CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass'; GRANT ALL ON `$dbname`.* TO '$user'@'localhost'; FLUSH PRIVILEGES; DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci") 
    or die(print_r($db->errorInfo(), true));
} catch(PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
}

//migrate
include_once "users.php";

//seed
include_once "user_seed.php";

echo "\n Success All!!! \n";