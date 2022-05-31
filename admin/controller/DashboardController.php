<?php

namespace Admin\controller;

use Admin\model\user\UserRepository;

class DashboardController extends AdminController
{
    public $userModel;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->userModel = new UserRepository($this->di);
    }

    public function index()
    {
        //may be fix with Load Class (22 lesson)
        //$userModel = new UserRepository($this->di);
        //$userModel->addUser();
        //print_r($userModel->getUsers());

        $this->data['users'] = $this->userModel->getUsers();

        $this->view->render('dashboard', $this->data);

    }
}