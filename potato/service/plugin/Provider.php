<?php

namespace Potato\service\plugin;

use Potato\service\AbstractProvider;
use Potato\core\plugin\Plugin;

class Provider extends AbstractProvider
{
    public $serviceName = 'plugin';

    function init()
    {
        $plugin = new Plugin($this->di);

        $this->di->set($this->serviceName, $plugin);

        return $this;
    }
}