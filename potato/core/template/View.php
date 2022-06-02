<?php

namespace Potato\core\template;

use Potato\core\config\Config;
use Potato\DI\DI;

class View {

    public $di;

    protected $theme;
    protected $setting;
    protected $menu;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->theme = new Theme();
        $this->setting = new Setting($di);
        $this->menu = new Menu($di);
    }

    public function render($template, $vars = [])
    {
        $function = Theme::getThemePath() . '/function.php';

        if (file_exists($function)) {
            include_once $function;
        }

        $templatePath = $this->getTemplatePath($template, ENV);

        if(!is_file($templatePath)) {
            throw new \InvalidArgumentException(sprintf(
                "Template %s not found %s", $template, $templatePath
            ));
        }
        $this->theme->setData($vars);

        extract($vars);
        ob_start();
        ob_implicit_flush(0);

        try {
            require $templatePath;
        } catch (\Exception $e){
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();
    }

    private function getTemplatePath($template, $env = NULL)
    {
        if($env == 'SampleText') {
            $theme = \Setting::get('active_theme');
            if ($theme == '') {
                $theme = \Potato\core\config\Config::item('defaultTheme');
            }
            return ROOT_DIR . '/source/theme/' . $theme . '/' . $template . '.php';
        }

        return ROOT_DIR . '/view/' . $template . '.php';
    }

}