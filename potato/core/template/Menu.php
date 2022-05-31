<?php

namespace Potato\core\template;

use Potato\DI\DI;
use SampleText\model\menuItem\MenuItemRepository;

class Menu
{
    protected static $di;
    protected static $menuRepository;
    protected static $menuItemRepository;

    public function __construct($di)
    {
        self::$di = $di;
        self::$menuItemRepository = new MenuItemRepository(self::$di);
    }

    public static function getItems($menuId = 1)
    {
       return self::$menuItemRepository->getItems($menuId);
    }
}