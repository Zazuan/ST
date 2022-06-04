<?php


namespace Potato\helper;


class FileSystem
{
    public static function delTree($dir)
    {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }

        return rmdir($dir);
    }

    public static function getFilesSize($path): string
    {
        return self::convertBytes(self::scanDirectory(".." . $path));
    }

    public static function scanDirectory($path)
    {
        $path = rtrim($path, '/');
        $size = 0;

        $dir = opendir($path);
        if (!$dir) {
            return 0;
        }

        while (false !== ($file = readdir($dir))) {
            if ($file == '.' || $file == '..') {
                continue;
            } elseif (is_dir($path . "/" . $file)) {
                $size += self::scanDirectory($path . DS . $file);
            } else {
                $size += filesize($path . DS . $file);
            }
        }
        closedir($dir);
        return $size;
    }

    public static function convertBytes($size): string
    {
        $i = 0;
        while (floor($size / 1024) > 0) {
            ++$i;
            $size /= 1024;
        }

        $size = str_replace('.', ',', round($size, 1));
        switch ($i) {
            case 0: return $size .= ' байт';
            case 1: return $size .= ' КБ';
            case 2: return $size .= ' МБ';
        }
        return false;
    }
}