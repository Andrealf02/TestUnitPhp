<?php


namespace Red5g\Test;


class FinsonetTestCase extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        $_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__) . "/../../..";
    }

    public static function tearDownAfterClass()
    {
        unset($_SERVER['DOCUMENT_ROOT']);
    }
}