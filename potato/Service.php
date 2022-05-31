<?php

namespace Potato;

use Potato\DI\DI;

class Service
{
    protected $di;
    protected $db;
    protected $model;
    private $load;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->model = $this->di->get('model');
        $this->load = $this->di->get('load');
    }

    public function getDi()
    {
        return $this->di;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function getLoad()
    {
        return $this->load;
    }

    public function getModel($name)
    {
        $this->load->model(ucfirst($name), false, 'Admin');

        $model = $this->getDi()->get('model');

        return $model->{lcfirst($name)};
    }


}