<?php

namespace Potato\service\config;

use Potato\service\AbstractProvider;
use Potato\core\config\Config;

class Provider extends AbstractProvider
{
    public $serviceName = 'config';

    public function init()
    {
        $config['main'] = Config::file('main');
        $config['database'] = Config::file('connect');
        $this->di->set($this->serviceName, $config);
    }
}