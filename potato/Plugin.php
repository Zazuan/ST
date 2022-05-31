<?php

namespace Potato;

use Potato\core\database\Db;
use Potato\core\router\Router;
use Potato\DI\DI;

abstract class Plugin
{
    protected $di;
    protected $db;
    protected $router;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->router = $this->di->get('router');
    }

    abstract public function details();

    public function getDi()
    {
        return $this->di;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function getRouter()
    {
        return $this->router;
    }
}