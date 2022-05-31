<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Function.php';

use Potato\Cms;
use Potato\DI\DI;

class_alias('Potato\\core\\template\\Asset', 'Asset');
class_alias('Potato\\core\\template\\Theme', 'Theme');
class_alias('Potato\\Core\\Template\\Setting', 'Setting');
class_alias('Potato\\Core\\Template\\Menu', 'Menu');

    try {
        $di = new DI();

        $services = require __DIR__ . '/config/Service.php';

        foreach ($services as $service)
        {
            $provider = new $service($di);
            $provider->init();
        }

        $cms = new Cms($di);

        $cms->run();

    } catch(\ErrorException $e) {
        echo $e->getMessage();
    }