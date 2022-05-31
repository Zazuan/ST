<?php

namespace SampleText\classes;

class Page
{
    protected static $page;

    public static function setPage(Page $page)
    {
        self::$page = $page;
    }

    public static function getPage()
    {
        return self::$page;
    }

    public static function getId()
    {
        echo static::$page->id;
    }

    public static function title()
    {
        echo static::$page->title;
    }

    public static function content()
    {
        echo static::$page->content;
    }
}