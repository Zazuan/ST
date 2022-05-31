<?php

namespace Admin\model\setting;

use Potato\core\database\ActiveRecord;

class Setting
{
    use ActiveRecord;

    protected $table = 'setting';

    public $id;
    public $name;
    public $key_field;
    public $value;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getKeyField()
    {
        return $this->key_field;
    }

    public function setKeyField($key_field)
    {
        $this->key_field = $key_field;
    }
}