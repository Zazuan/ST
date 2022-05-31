<?php

namespace Potato\service\request;

use Potato\service\AbstractProvider;
use Potato\core\request\Request;

class Provider extends AbstractProvider
{
    public $serviceName = 'request';

    public function init()
    {
        $request = new Request();

        $this->di->set($this->serviceName, $request);
    }
}