<?php

namespace SampleText\controller;

use Potato\Controller;

class CmsController extends Controller
{
    public $data = [];

    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function header()
    {

    }
}