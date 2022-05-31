<?php

namespace Potato\service\database;

use Potato\service\AbstractProvider;
use Potato\core\database\Db;
use Potato\core\config\Config;

class Provider extends AbstractProvider
{

    public $serviceName = 'db';

    public function init()
    {
        $config = Config::group('connect');

        $this->di->set($this->serviceName, new Db($config));

        return $this;
    }
}