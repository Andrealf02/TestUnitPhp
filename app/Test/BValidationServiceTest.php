<?php

namespace Red5g\Test;

use Red5g\Services\ValidationService;

class BValidationServiceTest extends FinsonetTestCase
{

    /**
     * El validador debe devolver false ante un string inválido
     */
    public function testEmailInvalid()
    {
        $email = 'jtrezza.com';
        $this->assertFalse(ValidationService::emailValid($email));
    }

    /**
     * El validador debe devolver true ante un string válido
     */
    public function testEmailValid()
    {
        $email = 'im@jtrezza.com';
        $this->assertTrue(ValidationService::emailValid($email));
    }

    public function testDateInvalid()
    {
        $date = '199593845-565-55';
        $this->assertFalse(ValidationService::dateValid($date));
    }

    public function testDateValid()
    {
        $date = '2001-09-11';
        $this->assertTrue(ValidationService::dateValid($date));
    }
}