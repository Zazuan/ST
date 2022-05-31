<?php

namespace SampleText\controller;

class AdminController extends CmsController
{
    public function index()
    {
        echo 'Admin Page';
    }

    public function single($id = null)
    {
        echo 'post' . $id;
    }
}