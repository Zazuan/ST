<?php

namespace Admin\model\article;

use Potato\core\database\ActiveRecord;

class Article
{
    use ActiveRecord;

    protected $table = 'article';

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