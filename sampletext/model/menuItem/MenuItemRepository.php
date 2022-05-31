<?php

namespace SampleText\model\menuItem;

use Potato\Model;

class MenuItemRepository extends Model
{
    const NEW_MENU_ITEM_NAME = 'New item';
    const FIELD_NAME = 'title';
    const FIELD_LINK = 'link';

    public function getAllItems()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('menu_item')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }

    public function getItems($menuId, $params = [])
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('menu_item')
            ->where('menu_id', $menuId)
            ->orderBy('position', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function add($params = [])
    {
        if (empty($params)) {
            return 0;
        }

        $menuItem = new MenuItem;
        $menuItem->setMenuId($params['menu_id']);
        $menuItem->setTitle(self::NEW_MENU_ITEM_NAME);

        return $menuItem->save();
    }

    public function remove($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('menu_item')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function removeByMenuId($menuId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('menu_item')
            ->where('menu_id', $menuId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function update($params = [])
    {
        if (empty($params)) {
            return 0;
        }

        $menuItem = new MenuItem($params['item_id']);

        if ($params['field'] == self::FIELD_NAME) {
            $menuItem->setTitle($params['value']);
        }

        if ($params['field'] == self::FIELD_LINK) {
            $menuItem->setLink($params['value']);
        }

        return $menuItem->save();
    }

    public function sort($params = [])
    {
        $items = isset($params['data']) ? json_decode($params['data']) : [];

        if (!empty($items) and isset($items[0])) {
            foreach ($items as $position => $item) {
                $this->db->execute(
                    $this->queryBuilder
                        ->update('menu_item')
                        ->set(['position' => $position])
                        ->where('id', $item)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }
        }
    }
}