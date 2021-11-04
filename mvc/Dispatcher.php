<?php
namespace MVC;
use MVC\Request;
class Dispatcher
{

    private $request;
    public function __construct() {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = 'MVC\Controllers\\'.$this->request->controller.'Controller';
        $controller = new $name();
        return $controller;
    }

}
?>