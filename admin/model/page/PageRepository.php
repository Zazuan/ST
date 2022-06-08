<?php

namespace Admin\model\page;

use Potato\helper\Text;
use Potato\Model;

class PageRepository extends Model
{
    public function getPages()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('page')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function createPage($params)
    {
        $params['page-id'] = $this->getAmount();

        $page = new Page($params['page-id']);
        $page->setTitle($params['page-title']);
        $page->setContent($params['page-content']);
        $page->setType($params['page-type']);
        $page->setStatus($params['page-status']);
        $page->setSegment(Text::transliteration($params['page-title']));

        return $page->insert();
    }

    public function updatePage($params)
    {
        if (isset($params['page-id'])) {
            $page = new Page($params['page-id']);
            $page->setTitle($params['page-title']);
            $page->setContent($params['page-content']);
            $page->setType($params['page-type']);
            $page->setStatus($params['page-status']);
            $page->setSegment($params['page-segment']);
            $page->update();
        }
        return null;
    }

    public function getPageById($id)
    {
        $page = new Page($id);
        return $page->findOne();
    }

    public function getPageBySegment($segment)
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('page')
            ->where('segment', $segment)
            ->limit(1)
            ->sql();

        $result = $this->db->query($sql, $this->queryBuilder->values);

        return $result[0] ?? false;
    }

    public function deletePage($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('page')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function getAmount($array = []): int
    {
        $array = $this->getPages();
        $amount = 0;
        foreach($array as $elem)
            $amount += 1;
        return $amount+1;
    }

}