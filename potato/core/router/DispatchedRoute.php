<?php

namespace Potato\core\router;

class DispatchedRoute
{
    private $controller;
    private $parameters;

    public function __construct($controller, $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getController()
    {
        return $this->controller;
    }

}