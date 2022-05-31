<?php

namespace Potato\service\router;

use Potato\service\AbstractProvider;
use Potato\core\router\Router;

class Provider extends AbstractProvider
{

    public $serviceName = 'router';

    public function init()
    {
        $router = new Router('http://sampletext/');

        $this->di->set($this->serviceName, $router);
    }
}