<?php

namespace Potato\service\database;

use Potato\service\AbstractProvider;
use Potato\core\database\Db;

class Provider extends AbstractProvider
{

    public $serviceName = 'db';

    public function init()
    {
        $db = new Db();

        $this->di->set($this->serviceName, $db);
    }
}