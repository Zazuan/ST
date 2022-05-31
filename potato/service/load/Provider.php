<?php

namespace Potato\service\load;

use Potato\service\AbstractProvider;
use Potato\Load;

class Provider extends AbstractProvider
{
    public $serviceName = 'load';

    public function init()
    {
        $load = new Load($this->di);

        $this->di->set($this->serviceName, $load);
    }
}