<?php
/**
 * Esta clase no ofrece nada nuevo, solo es una prueba
 * de que funcionen aún los tests en subdirectorios
 */

namespace Red5g\Test\Services;


use Red5g\Test\FinsonetTestCase;
use Red5g\Models\User;

class InsideDirectoryTest extends FinsonetTestCase{

    public function setUp()
    {
        User::create(['username'=>'la_yuyeimy', 'email'=>'layuyeimy@fincho.co', 'password'=>'123456']);
    }

    public function testTrue()
    {
        $bool = true;
        $this->assertTrue($bool);
    }

    public function testSuccessfullyPasswordChange()
    {
        $new_password = 'something_new';
        $user = User::where('username', 'la_yuyeimy')->first();
        $user->changePassword($new_password);
        $user->save();

        $user = null;
        $user = User::where('username', 'la_yuyeimy')->first();
        $this->assertEquals(sha1($new_password), $user->password);
    }

    /**
     * tearDown se ejecuta después de cada test. tearDownAfterClass, solo
     * después del último.
     */
    public function tearDown()
    {
        User::truncate();
    }


}