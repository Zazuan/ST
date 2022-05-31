<?php

/**
 * GET Routes
 */

// Auth
$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');

// Dashboard
$this->router->add('dashboard', '/admin/', 'DashboardController:index');

// Settings
$this->router->add('settings', '/admin/settings/', 'SettingController:index');

// Pages
$this->router->add('pages', '/admin/pages/', 'PageController:index');
$this->router->add('page-create', '/admin/pages/create/', 'PageController:create');
$this->router->add('page-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');
//$this->router->add('page-delete', '/admin/page/delete/(id:int)', 'PageController:delete');

// Article
$this->router->add('articles', '/admin/articles/', 'ArticleController:index');
$this->router->add('articles-create', '/admin/articles/create/', 'ArticleController:create');
$this->router->add('articles-edit', '/admin/articles/edit/(id:int)', 'ArticleController:edit');
//$this->router->add('articles-delete', '/admin/articles/delete/(id:int)', 'ArticleController:delete');

// Posts
$this->router->add('posts', '/admin/posts/', 'PostController:index');
$this->router->add('post-create', '/admin/post/create/', 'PostController:create');
$this->router->add('post-edit', '/admin/post/edit/(id:int)', 'PostController:edit');
//$this->router->add('post-delete', '/admin/post/delete/(id:int)', 'PostController:delete');

// Menus
$this->router->add('menus', '/admin/menus/', 'MenuController:index');
$this->router->add('menu-create', '/admin/menu/create/', 'MenuController:create');
$this->router->add('menu-edit', '/admin/menu/edit/(id:int)', 'MenuController:edit');
//$this->router->add('menu-delete', '/admin/menu/delete/(id:int)', 'MenuController:delete');

// Themes
$this->router->add('themes', '/admin/themes/', 'ThemeController:index');
$this->router->add('theme-create', '/admin/theme/create/', 'ThemeController:create');
$this->router->add('theme-edit', '/admin/theme/edit/(id:int)', 'ThemeController:edit');

// Plugins
$this->router->add('plugins', '/admin/plugins/', 'PluginController:index');


/**
 * POST Routes
 */

// Auth
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');

// Settings
$this->router->add('setting-update', '/admin/settings/update/', 'SettingController:update', 'POST');

// Pages
$this->router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');
$this->router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');
$this->router->add('page-delete', '/admin/page/delete/', 'PageController:delete', 'POST');
$this->router->add('page-updateSegment', '/admin/page/updateSegment/', 'PageController:updateSegment', 'POST');


// Article
$this->router->add('article-add', '/admin/article/add/', 'ArticleController:add', 'POST');
$this->router->add('article-update', '/admin/article/update/', 'ArticleController:update', 'POST');
$this->router->add('article-delete', '/admin/article/delete/', 'ArticleController:delete', 'POST');

// Posts
$this->router->add('post-add', '/admin/post/add/', 'PostController:add', 'POST');
$this->router->add('post-update', '/admin/post/update/', 'PostController:update', 'POST');
$this->router->add('post-delete', '/admin/post/delete/', 'PostController:delete', 'POST');

// Menu
$this->router->add('menu-add', '/admin/menu/add/', 'MenuController:add', 'POST');
$this->router->add('menu-update', '/admin/menu/update/', 'MenuController:update', 'POST');
$this->router->add('menu-delete', '/admin/menu/delete/', 'MenuController:delete', 'POST');

// Menu Item
$this->router->add('menu-addItem', '/admin/menu/addItem/', 'MenuController:addItem', 'POST');
$this->router->add('menu-deleteItem', '/admin/menu/deleteItem/', 'MenuController:deleteItem', 'POST');
$this->router->add('menu-sortItems', '/admin/menu/sortItems/', 'MenuController:sortItems', 'POST');
$this->router->add('menu-updateItem', '/admin/menu/updateItem/', 'MenuController:updateItem', 'POST');

// Theme
$this->router->add('theme-add', '/admin/theme/add/', 'ThemeController:add', 'POST');
$this->router->add('theme-update', '/admin/theme/update/', 'ThemeController:update', 'POST');
$this->router->add('theme-delete', '/admin/theme/delete/', 'ThemeController:delete', 'POST');
$this->router->add('theme-activate', '/admin/theme/activateTheme/', 'ThemeController:activateTheme', 'POST');

// Plugins
$this->router->add('plugin-install', '/admin/plugin/install/', 'PluginController:installPlugin', 'POST');
$this->router->add('plugin-activate', '/admin/plugin/activate/', 'PluginController:activatePlugin', 'POST');
$this->router->add('plugin-delete', '/admin/plugin/delete/', 'PluginController:deletePlugin', 'POST');
