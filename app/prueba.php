<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/phpunit/config_composer.php';

use Red5g\Models\User;

User::create(['username'=>'la_yuyeimy', 'email'=>'layuyeimy@fincho.co', 'password'=>'123456']);
User::create(['username'=>'la_yuyeimy2', 'email'=>'layuyeimy2@fincho.co', 'password'=>'123456']);

$usuarios = User::all();

echo $usuarios;