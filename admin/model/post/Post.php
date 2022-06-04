<?php

namespace Admin\model\post;

use Potato\core\database\ActiveRecord;

class Post
{
    use ActiveRecord;

    protected $table = 'post';

    public $id;
    public $title;
    public $content;
    public $article;
    public $segment;
    public $status;
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

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setArticle($article)
    {
        $this->article = $article;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getSegment()
    {
        return $this->segment;
    }

    public function setSegment($segment): void
    {
        $this->segment = $segment;
    }


}