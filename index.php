<?php

use Potato\core\redirect\Redirect;

ini_set("display_errors",1);
error_reporting(E_ALL);

const ROOT_DIR = __DIR__;
const DS = DIRECTORY_SEPARATOR;
const ENV = 'SampleText';

if (!is_file($_SERVER['DOCUMENT_ROOT'] . '/config/connect.php')) {
    Redirect::go('/install/');
}

require_once 'potato/sample-load.php';

