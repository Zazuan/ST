<?php


namespace SampleText\model\menu;

use Potato\core\database\ActiveRecord;

class Menu
{
    use ActiveRecord;

    protected $table = 'menu';

    public $id;
    public $title;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
}