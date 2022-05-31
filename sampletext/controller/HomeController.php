<?php

namespace SampleText\controller;

class HomeController extends CmsController
{
    public function index()
    {
        $data = ['name' => 'Name'];
        $this->view->render('index', $data);
    }
}