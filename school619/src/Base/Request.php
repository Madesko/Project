<?php
namespace Alexandr\Vatutin\School619\Base;

class Request
{
    private $get; 
    private $post;
    private $files;
    private $server;
    private $params;
    public function __construct()
    {

        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
        $this->server = $_SERVER;
    }

    public function setParams($params){
        $this->params = $params;
    }
    public function params(){
        return $this->params;
    }

    public function getMethod(){
        return $this->server['REQUEST_METHOD'];
    }

    public function getUri(){
        return $this->server['REQUEST_URI'];
    }
    public function get(){
        return $this->get;
    }
    public function post(){
        return $this->post;
    }
    public function files(){
        return $this->files;
    }
    public function server(){
        return $this->server;
    }
}