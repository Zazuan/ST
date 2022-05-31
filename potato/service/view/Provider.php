<?php

namespace Potato\service\view;

use Potato\service\AbstractProvider;
use Potato\core\template\View;

class Provider extends AbstractProvider
{

    public $serviceName = 'view';

    public function init()
    {
        $view = new View($this->di);

        $this->di->set($this->serviceName, $view);
    }
}