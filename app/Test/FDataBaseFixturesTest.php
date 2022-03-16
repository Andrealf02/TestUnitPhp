<?php

namespace Red5g\Test;
use Red5g\Models\User;

class FDataBaseFixturesTest extends FinsonetTestCase
{
    /**
     * setUp se ejecuta antes de cada test. setUpBeforeClass, solo
     * antes del primero.
     */
    public function setUp()
    {
        User::create(['username'=>'la_yuyeimy', 'email'=>'layuyeimy@fincho.co', 'password'=>'123456']);
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