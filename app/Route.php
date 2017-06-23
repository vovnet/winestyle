<?php


namespace app;


use controllers\NotFoundController;

class Route
{
    public $routes;

    private $controller;

    public function start()
    {
        $this->routes = explode('/', $_SERVER['REQUEST_URI']);
        $controllerName = ucfirst($this->routes[1]);
        $actionName = ucfirst($this->routes[2]);

        $controllerName = ($controllerName === '') ? 'Main' : $controllerName;

        $this->createController($controllerName);
        $this->callAction($actionName);
    }



    private function createController($controllerName)
    {
        $className = 'controllers\\' . $controllerName . 'Controller';
        $classPath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $className . '.php';

        if (file_exists($classPath)) {
            $this->controller = new $className();
        } else {
            $this->controller = new NotFoundController();
        }
    }


    private function callAction($actionName)
    {
        if (isset($this->routes[2]) && $this->routes[2] != '') {
            $act = 'action' . $actionName;

            if (method_exists($this->controller, $act)) {
                $this->controller->$act();
            } else {
                $this->controller = new NotFoundController();
                $this->controller->actionIndex();
            }
        } else {
            $this->controller->actionIndex();
        }
    }

}