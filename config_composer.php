<?php
//El archivo autoload carga todas las dependencias descargadas en el directorio vendor
require_once 'vendor/autoload.php';

//Indicamos el uso de la clase Capsule, escribiendo su namespace completo
use Illuminate\Database\Capsule\Manager as Capsule;
//use Acme\Validation\Capsule as Validation;

$capsule = new Capsule;

//Datos de configuración de la BD
$capsule->addConnection([
    'driver' =>'mysql',
    'host' => 'localhost',
    'database' => 'test',
    'username' => 'user',
    'password' => 'pass',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
