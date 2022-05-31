<?php

namespace Admin\controller;

use Admin\model\plugin\PluginRepository;

class PluginController extends AdminController
{
    public $pluginModel;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->pluginModel = new PluginRepository($this->di);
    }

    public function index()
    {
        $installedPlugins = $this->pluginModel->getPlugins();
        $plugins = getPlugins();

        foreach ($installedPlugins as $plugin) {
            $plugins[$plugin->directory]['plugin_id'] = $plugin->id;
            $plugins[$plugin->directory]['is_active'] = $plugin->is_active;
            $plugins[$plugin->directory]['is_install'] = true;
        }

        $this->data['plugins'] = $plugins;

        $this->view->render('plugins', $this->data);
    }

    public function installPlugin()
    {
        $directory = $this->getRequest()->post('directory');

        if($directory !== null) {
            $this->getPlugin()->install($directory);
        }
    }

    public function activatePlugin()
    {
        $pluginID = $this->getRequest()->post('plugin_id');
        $active = $this->getRequest()->post('plugin_active');

        if($pluginID !== null) {
            $this->getPlugin()->activate($pluginID, $active);
        }
    }

    public function deletePlugin()
    {
        $pluginID = $this->getRequest()->post('plugin_id');

        if($pluginID !== null) {
            $this->getPlugin()->delete($pluginID);
        }
    }
}