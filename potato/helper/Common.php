<?php

namespace Potato\helper;

class Common
{
    public static function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }

        return false;
    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getPathUrl()
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        if($position = strpos($pathUrl, '?')){
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }

    public static function searchMatchString($string, $find)
    {
        if (strripos($string, $find) !== false) return true;
        return false;
    }


}