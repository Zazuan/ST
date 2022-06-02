<?php

function path($section): string
{
    $pathMask = ROOT_DIR . DS . '%s';

    if (ENV == 'SampleText') {
        $pathMask = ROOT_DIR . DS . strtolower(ENV). DS . '%s';
    }

    // Return path to correct section.
    switch (strtolower($section))
    {
        case 'controller':
            return sprintf($pathMask, 'controller');
        case 'config':
            return sprintf(ROOT_DIR . DS . '%s', 'config');
        case 'model':
            return sprintf($pathMask, 'model');
        case 'view':
            return sprintf($pathMask, 'view');
        default:
            return ROOT_DIR;
    }
}

function pathContent($section = ''): string
{
    $pathMask = $_SERVER['DOCUMENT_ROOT'] . DS . 'source' . DS . '%s';

    // Return path to correct section.
    switch (strtolower($section))
    {
        case 'themes':
            return sprintf($pathMask, 'themes');
        case 'plugins':
            return sprintf($pathMask, 'plugins');
        case 'test':
            return sprintf($pathMask, 'test');
        default:
            return $_SERVER['DOCUMENT_ROOT'] . DS . 'content';
    }
}

function getThemes(): array
{
    $themesPath = '../source/theme';
    $list = scandir($themesPath);
    $baseUrl = \Potato\core\config\Config::item('base_url');
    $themes = [];

    if(!empty($list)) {
        unset($list[0]); //.
        unset($list[1]); //..

        foreach ($list as $dir) {
            $pathThemeDir = $themesPath . '/' . $dir;
            $pathConfig = $pathThemeDir . '/theme.json';
            $pathScreen = '/source/theme/' . $dir . '/screen.png';
            if (is_dir($pathThemeDir) && is_file($pathConfig)) {
                $config = file_get_contents($pathConfig);
                $info = json_decode($config);

                $info->screen = $pathScreen;
                $info->dirTheme = $dir;

                $themes[] = $info;
            }
        }
    }
    return $themes;
}

//function updateTheme()
//{
//    $themesPath = '../source/theme';
//    $list = scandir($themesPath);
//}

function getPlugins(): array
{
    global $di;

    $pluginsPath = pathContent('plugins');
    $list = scandir($pluginsPath);
    $plugins = [];

    if(!empty($list)) {
        unset($list[0]); //.
        unset($list[1]); //..

        foreach ($list as $pluginName) {

            $namespace = '\\Plugin\\' . $pluginName . '\\Plugin';

            if (class_exists($namespace)) {
                $plugin = new $namespace($di);
                $plugins[$pluginName] = $plugin->details();
            }
        }
    }
    return $plugins;
}

function getTypes($switch = 'page'): array
{
    $themePath = pathContent('themes') . '/' . \Setting::get('active_theme');
    $list      = scandir($themePath);
    $types     = [];

    if (!empty($list)) {
        unset($list[0]);
        unset($list[1]);

        foreach ($list as $name) {
            if (\Potato\Helper\Common::searchMatchString($name, $switch)) {
                list($switch, $key) = explode('-', $name, 2);

                if (!empty($key)) {
                    list($nameType) = explode('.', $key, 2);
                    $types[$nameType] = ucfirst($nameType);
                }
            }
        }
    }

    return $types;
}


function countPostsByArticle($articleId, $posts): int
{
    $count = 0;
    foreach ($posts as $post) {
        if (!empty($post->article)) {
            if ($post->article == $articleId) $count++;
        }
    }
    return $count;
}


//function getFilesSize()
//{
//    $fileSize = 0;
//
//    $themesPath = '../source/theme';
//    $list = scandir($themesPath);
//
//    $currentTheme = Setting::get('active_theme');
//
//    if(!empty($list)) {
//        unset($list[0]); //.
//        unset($list[1]); //..
//        foreach($list as $dir) {
//            if ($dir == $currentTheme) {
//                $pathThemeDir = $themesPath . '/' . $dir . '/';
//                $fileList = scandir($pathThemeDir);
//                foreach ($fileList as $file){
//                    if(is_dir($file))
//                        $fileSize += getFilesSize($file);
//                    else
//                        $fileSize += filesize($file);
//                }
//            }
//        }
//    }
//
//    return $fileSize;
//}