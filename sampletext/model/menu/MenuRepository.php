<?php

namespace SampleText\model\menu;

use Potato\Model;

class MenuRepository extends Model
{


    public function getList()
    {
        $query = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from('menu')
                ->orderBy('id', 'DESC')
                ->sql()
        );

        return $query;
    }

    public function createMenu($params = [])
    {
        if (empty($params)) {
            return 0;
        }

        $menu = new Menu;
        $menu->setTitle($params['menu-title']);
        $menuId = $menu->save();

        return $menuId;
    }

    public function updateMenu($params = [])
    {
        if (isset($params['menu-id'])) {
            $menu = new Menu($params['menu-id']);
            $menu->setTitle($params['menu-title']);
            $menu->save();
        }
        return 0;
    }

    public function deleteMenu($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('menu')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
}