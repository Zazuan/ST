<?php

namespace Potato\core\template;

use Potato\core\config\Config;

class Theme
{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    const URL_THEME_MASK = '%s/source/theme/%s';

    public $url = '';
    public $asset;
    public $theme;

    protected static $data = [];

    public function __construct()
    {
        $this->asset = new Asset();
        $this->theme = $this;
    }

    public static function header($name = null)
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);
        Component::load($file);
    }

    public static function footer($name = null)
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);
        Component::load($file);
    }

    public static function sidebar($name = null)
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);
        Component::load($file);
    }

    public static function block($name = null, $data = [])
    {
        $name = (string) $name;

        if($name != '') {
            Component::load($name, $data);
        }
        //add new name if not exist
    }

    private static function detectNameFile($name, $function)
    {
        return empty(trim($name)) ? $function : sprintf(self::RULES_NAME_FILE[$function], $name);
    }

    public static function title()
    {
        $nameSite    = Setting::get('name_site');
        $description = Setting::get('description');

        echo $nameSite . ' | ' . $description;
    }

    public static function getUrl()
    {
        $currentTheme = Setting::get('active_theme');
        if (empty($currentTheme)) $currentTheme = Config::item('defaultTheme', 'main');

        $baseUrl      = Config::item('baseUrl', 'main');

        return sprintf(self::URL_THEME_MASK, $baseUrl, $currentTheme);
    }

    public static function getThemePath()
    {
        $activeTheme = Setting::get('active_theme');

        if(empty($activeTheme)) {
            $activeTheme = Config::item('defaultTheme');
        }

        return ROOT_DIR . '/source/theme/' . $activeTheme;
    }

    public static function Path()
    {
        $activeTheme = Setting::get('active_theme');

        if(empty($activeTheme)) {
            $activeTheme = Config::item('defaultTheme');
        }

        return '/source/theme/' . $activeTheme;
    }

    public static function getData()
    {
        return static::$data;
        //return $this->data;
    }

    public static function setData($data)
    {
        return static::$data;
    }

}