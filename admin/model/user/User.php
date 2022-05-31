<?php

namespace Admin\model\user;

use Potato\core\database\ActiveRecord;

class User
{
    use ActiveRecord;

    protected $table = 'user';

    public $id;
    public $email;
    public $password;
    public $role;
    public $hash;
    public $date_reg;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    public function getDateReg()
    {
        return $this->date_reg;
    }

    public function setDateReg($date_reg)
    {
        $this->date_reg = $date_reg;
    }
}