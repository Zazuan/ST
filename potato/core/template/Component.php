<?php

namespace Potato\core\template;


class Component
{
    public static function load($name, $data = [])
    {
        $templateFile = ROOT_DIR . '/source/theme/default/' . $name . '.php';

        if (ENV == 'Admin') {
            $templateFile = path('view') . '/' . $name . '.php';
        }

        if (is_file($templateFile)) {
            extract(array_merge($data, Theme::getData()));
            require($templateFile);
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }
}