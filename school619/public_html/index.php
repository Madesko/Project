<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
$request = new \Alexandr\Vatutin\School619\Base\Request();

$config = __DIR__ . '/../config.json';

$app = new \Alexandr\Vatutin\School619\Base\Application($config);
$response = $app->handleRequest($request);
$response->send();

