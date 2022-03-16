<?php

namespace Red5g\Models;

require_once $_SERVER['DOCUMENT_ROOT'].'/phpunit/config_composer.php';
/**
 * Documentación de Eloquent: http://laravel.com/docs/4.2/eloquent
 */
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = ['username', 'email', 'password'];

    public function changePassword($newPassword)
    {
        $hashed = sha1($newPassword);
        $this->password = $hashed;
    }
}