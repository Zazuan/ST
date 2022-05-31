<?php

namespace Potato\service;

abstract class AbstractProvider
{

    protected $di;

    public function __construct(\Potato\DI\DI $di)
    {
        $this->di = $di;
    }

    abstract function init();

}