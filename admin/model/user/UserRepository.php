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

    public function addUser()
    {
        $user = new User();
        $user->setEmail('user@email.com');
        $user->setPassword(md5(rand(1,10)));
        $user->setRole('user');
        $user->setHash('newuser');
        $user->save();
    }

}