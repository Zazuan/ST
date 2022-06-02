<?php

// Routes
$this->router->add('home', '/', 'HomeController:index');
$this->router->add('page', '/(segment:any)', 'PageController:show');
$this->router->add('post-single', '/post/(segment:any)', 'PageController:show');