<?php

namespace Alexandr\Vatutin\School619\Base;


class Response
{
    private $body;
    private $headers = [];
    private $statusCode = 200;

    public function __construct(
        $body='',$headers=[],$statusCode=200)
    {
        $this->setBody($body)
            ->setHeaders($headers)
            ->setStatusCode($statusCode);
    }

    public function setBody($body){
        $this->body = $body;
        return $this;
    }
    public function setHeaders($headers){
        $this->headers = $headers;
        return $this;
    }
    public function setStatusCode($code){
        $this->statusCode = $code;
        return $this;
    }

    public function send(){
        $this->sendBody();
        return $this;
    }


    private function sendBody(){
        echo $this->body; 
    }
}