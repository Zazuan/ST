<?php

namespace Plugin\TestPlugin;

class Plugin extends \Potato\Plugin
{
    public function details()
    {
        return [
            'title' => 'Test Plugin',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui tempor at gravida eget sagittis aliquet massa. Malesuada fermentum, non etiam nunc sit leo, donec enim...',
            'author' => 'Zazik',
            'update' => '20.04.2022'
        ];
    }

    public function init()
    {
        // code here
    }
}