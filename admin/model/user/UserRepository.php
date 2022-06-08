<?php

namespace Admin\model\user;

use Potato\Model;

class UserRepository extends Model
{

    public function getUsers()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function getUserById($id)
    {
        $user = new User($id);
        return $user->findOne();
    }

    public function addUser($email, $password, $role)
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword(md5($password));
        $user->setRole($role);
        $user->setHash('newuser');
        $user->save();
    }

}