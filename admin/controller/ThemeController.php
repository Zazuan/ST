<?php

namespace Admin\controller;

use Admin\model\setting\SettingRepository;
use Potato\core\template\Theme;

class ThemeController extends AdminController
{
    public $themeModel;
    public $settingModel;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->settingModel = new SettingRepository($this->di);

    }

    public function index()
    {
        $this->data['searchText'] = (!empty($this->request->get['s']) ? $this->request->get['s'] : '0');

        $this->data['activeTheme'] = '';
        $this->data['themes'] = getThemes();
        $this->data['activeTheme'] = \Setting::get('active_theme');

        //$this->data['themes'] = $this->themeModel->getThemes();

        $this->view->render('themes', $this->data);
    }


    public function update()
    {
        $params = $this->request->post;

        $this->themeModel->updateTheme($params);
    }

    public function activateTheme()
    {
        $params = $this->request->post;
        $this->settingModel->updateActiveTheme($params['theme']);

    }

    public function delete()
    {
        $params = $this->request->post;
        echo \Potato\helper\FileSystem::delTree(pathContent('theme') . DS . $params['theme']);
    }
}