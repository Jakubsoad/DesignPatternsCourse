<?php

final class Singleton
{
    private static Singleton $instance;

    private string $test = 'test';

    private function __construct()
    {

    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        return self::$instance ?? self::$instance = new self();
    }

    /**
     * @return string
     */
    public function getTest(): string
    {
        return $this->test;
    }

    /**
     * @param string $test
     */
    public function setTest(string $test): void
    {
        $this->test = $test;
    }
}

$object = Singleton::getInstance();
$object2 = Singleton::getInstance();
$object->setTest('TEST2');

var_dump($object, $object2);