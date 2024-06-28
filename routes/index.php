<?php
// router.php

class Router {
    private $routes = [];

    public function get($route, $controllerMethod) {
        $this->routes['GET'][$route] = $controllerMethod;
    }

    public function post($route, $controllerMethod) {
        $this->routes['POST'][$route] = $controllerMethod;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = isset($_GET['url']) ? $_GET['url'] : '/'; // Default to root if no URL parameter

        if (isset($this->routes[$method][$url])) {
            $controllerMethod = $this->routes[$method][$url];
            $this->callControllerMethod($controllerMethod);
        } else {
            header('HTTP/1.1 404 Not Found');
            die('404 Page Not Found');
        }
    }

    private function callControllerMethod($controllerMethod) {
        list($controller, $method) = $controllerMethod;

        require_once 'controllers/' . $controller . '.php';
        $controllerInstance = new $controller();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $controllerInstance->$method();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controllerInstance->$method($_POST);
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            die('405 Method Not Allowed');
        }
    }
}
?>
