<?php

ini_set("display_errors",1);
error_reporting(E_ALL);

define('ROOT_DIR', __DIR__);
define('DS', DIRECTORY_SEPARATOR);
//define('SOURCE_DIR', '../../../source/theme/default/');
define('ENV', 'SampleText');

if (!is_file($_SERVER['DOCUMENT_ROOT'] . '/sampletext/config/connect.php')) {
    header('Location: /install');
    exit;
}

require_once 'potato/sample-load.php';

