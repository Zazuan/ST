<?php

// Routes
$this->router->add('home', '/', 'PageController:index');
$this->router->add('404', '/404', 'ErrorController:page404');
$this->router->add('page', '/(segment:any)', 'PageController:show');
$this->router->add('post', '/post/(segment:any)', 'PageController:showPost');
$this->router->add('article', '/category/(segment:any)', 'PageController:showArticle');