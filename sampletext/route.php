<?php

// Routes
$this->router->add('home', '/', 'HomeController:index');
$this->router->add('page', '/page/(segment:any)', 'PageController:show');