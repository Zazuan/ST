<?php

Asset::css('assets/styles/style.css');

function the_title()
{
    Theme::title();
}

function get_url()
{
    $theme = new \Potato\core\template\Theme();
    echo $theme->getUrl() . '/';
}