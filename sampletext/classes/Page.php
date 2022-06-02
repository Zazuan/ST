<?php

namespace SampleText\classes;

class Page
{
    protected static $store;

    public static function setStore($store)
    {
        self::$store = $store;
    }

    public static function getStore()
    {
        return self::$store;
    }

    public static function title()
    {
        echo static::$store->title;
    }

    public static function content()
    {
        echo static::$store->content;
    }
}