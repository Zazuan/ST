<?php

namespace Admin\model\article;

use Potato\core\database\ActiveRecord;

class Article
{
    use ActiveRecord;

    protected $table = 'article';

    public $id;
    public $title;
    public $segment;
    public $date;

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

    public function getSegment()
    {
        return $this->segment;
    }

    public function setSegment($segment): void
    {
        $this->segment = $segment;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }
}