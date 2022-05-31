<?php

namespace Admin\controller;

use Potato\controller;
use Potato\core\auth\auth;

class AdminController extends Controller
{
    protected $auth;
    public $data = [];

    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if($this->auth->hashUser() == null) {
            header('Location: /admin/login/');
            exit;
        }
    }

    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
        exit;
    }


}