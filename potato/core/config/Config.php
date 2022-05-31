<?php

namespace Potato\core\config;

class Config
{

    public static function item($key, $group = 'main')
    {
        if (!Repository::retrieve($group, $key)) {
            self::file($group);
        }

        return Repository::retrieve($group, $key);
    }

    public static function group($group)
    {
        if (!Repository::retrieveGroup($group)) {
            self::file($group);
        }

        return Repository::retrieveGroup($group);
    }

    public static function file($group = 'main')
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . DS . 'config' . DS . $group . '.php';

        // Check that the file exists before we attempt to load it.
        if (file_exists($path)) {
            // Get items from the file.
            $items = include $path;

            // Items must be an array.
            if (is_array($items)) {
                // Store items.
                foreach ($items as $key => $value) {
                    Repository::store($group, $key, $value);
                }

                // Successful file load.
                return true;
            } else {
                throw new \Exception(
                    sprintf(
                        'Config file %s is not a valid array.',
                        $path
                    )
                );
            }
        } else {
            throw new \Exception(
                sprintf(
                    'Cannot load config from file, file %s does not exist.',
                    $path
                )
            );
        }

        // File load unsuccessful.
        return false;
    }
}