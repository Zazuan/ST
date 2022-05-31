<?php

namespace Potato\core\plugin;

use Potato\Service;

class Plugin extends Service
{
    public function install($directory)
    {
        $this->getLoad()->model('Plugin');

        $pluginModel = $this->getModel('plugin');

        if (!$pluginModel->isInstallPlugin($directory)) {
            $pluginModel->addPlugin($directory);
        }
    }

    public function activate($id, $active)
    {
        $this->getLoad()->model('Plugin');

        $pluginModel = $this->getModel('plugin');
        $pluginModel->activatePlugin($id, $active);
    }

    public function delete($id)
    {
        $this->getLoad()->model('Plugin');

        $pluginModel = $this->getModel('plugin');
        $pluginModel->deletePlugin($id);
    }

    public function getActivePlugins()
    {
        $this->getLoad()->model('Plugin');

        $pluginModel = $this->getModel('plugin');

        return $pluginModel->getActivePlugins();
    }
}