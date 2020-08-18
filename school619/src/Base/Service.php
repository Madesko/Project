<?php


namespace Alexandr\Vatutin\School619\Base;

use Alexandr\Vatutin\School619\Base\DBConnection;

abstract class Service
{
    protected $dbConnection;

    public function __construct() {
        $this->dbConnection = DBConnection::getInstance();
    }
    // abstract public function doSomething();
}