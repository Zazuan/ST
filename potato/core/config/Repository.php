<?php

namespace Potato\core\config;

class Repository
{
    protected static $stored = [];

    public static function store($group, $key, $data)
    {
        // Ensure the group is a valid array.
        if (!isset(static::$stored[$group]) || !is_array(static::$stored[$group])) {
            static::$stored[$group] = [];
        }

        // Store the data.
        static::$stored[$group][$key] = $data;
    }

    public static function retrieve($group, $key)
    {
        return isset(static::$stored[$group][$key]) ? static::$stored[$group][$key] : false;
    }

    public static function retrieveGroup($group)
    {
        return isset(static::$stored[$group]) ? static::$stored[$group] : false;
    }
}