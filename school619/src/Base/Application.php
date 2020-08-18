<?php

namespace Alexandr\Vatutin\School619\Base;


class Application
{
    private $config;

    public function __construct($configFile)
    {
        $this->config =
            $this->loadConfig($configFile);
    }

    private function loadConfig($configFile){
        if (!is_readable($configFile)) {
            var_dump("not readable");
        }
        return json_decode(
            file_get_contents($configFile),
            true 
        );
    }


    public function handleRequest(Request $request){
        $router = new Router($this->config['urls']); 
        $db = DBConnection::getInstance();
        $db->initConnection($this->config['db']);

        $routeInfo = $router->dispatch(
            $request->getMethod(),
            $request->getUri()
        );

        $controllerData = Controller::create($routeInfo);

        $request->setParams($controllerData[1]);

        $response = call_user_func_array(
            $controllerData[0], 
            [$request] 
        ); 


        if (!$response instanceof Response){
            throw new \LogicException(
                "Problem with Response");
        }
        return $response;
    }

}