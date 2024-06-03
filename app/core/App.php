<?php

class App
{
    protected $controller = 'LandingPage';
    protected $method = 'index';
    protected $parameter = [];
    public function __construct()
    {
        $url = $this->parseURL();
        if (isset($url[0]) && file_exists('app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->parameter = array_values($url);
        }
        call_user_func_array([$this->controller, $this->method], $this->parameter);
    }
    public function parseURL()
    {

        $url = [null, null];
        if (isset($_GET['controller'])) {
            $url[0] = $_GET['controller'];
        }
        if (isset($_GET['method'])) {
            $url[1] = $_GET['method'];
        }
        foreach ($_GET as $key => $value) {
            if ($key !== 'controller' && $key !== 'method') {
                $url[$key] = $value;
            }
        }

        return $url;
    }
}
