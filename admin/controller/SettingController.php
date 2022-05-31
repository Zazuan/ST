<?php

namespace Admin\controller;

use Admin\model\setting\SettingRepository;

class SettingController extends AdminController
{
    public $settingModel;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->settingModel = new SettingRepository($this->di);

    }

    public function index()
    {

        $this->data['settings'] = $this->settingModel->getSettings();

        $this->view->render('settings', $this->data);
    }

    public function update()
    {
        $params = $this->request->post;

        $this->settingModel->update($params);
    }

}