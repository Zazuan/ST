<?php

namespace Admin\model\plugin;

use Potato\core\database\ActiveRecord;

class Plugin
{
    use ActiveRecord;

    protected $table = 'plugin';

    public $id;
    public $directory;
    public $is_active;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDirectory()
    {
        return $this->directory;
    }

    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }

    public function getIsActive()
    {
        return $this->is_active;
    }

    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }
}