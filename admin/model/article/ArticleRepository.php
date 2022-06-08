<?php

namespace Admin\model\article;

use Potato\helper\Text;
use Potato\Model;

class ArticleRepository extends Model
{
    public function getArticles()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('article')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function createArticle($params)
    {
        $params['article-id'] = $this->getAmount();

        $article = new Article($params['article-id']);
        $article->setTitle($params['article-title']);
        $article->setSegment(Text::transliteration($params['article-title']));
        return $article->insert();
    }

    public function updateArticle($params)
    {
        if (isset($params['article-id'])) {
            $article = new Article($params['article-id']);
            $article->setTitle($params['article-title']);
            $article->setSegment($params['article-segment']);

            return $article->update();
        }
        return false;
    }

    public function deleteArticle($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('article')
            ->where('id', $itemId)
            ->sql();

        $this->deleteSubArticle($itemId);
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function getArticleData($id)
    {
        $article = new Article($id);
        return $article->findOne();
    }

    public function getArticleBySegment($segment)
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('article')
            ->where('segment', $segment)
            ->limit(1)
            ->sql();

        $result = $this->db->query($sql, $this->queryBuilder->values);

        return $result[0] ?? false;
    }

    public function getArticleById($id)
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('article')
            ->where('id', $id)
            ->sql();

        $result = $this->db->query($sql, $this->queryBuilder->values);

        return $result[0] ?? false;
    }

    public function getAmount($array = []): int
    {
        $array = $this->getArticles();
        $amount = 0;
        foreach($array as $elem)
            $amount += 1;
        return $amount+1;
    }

    public function deleteSubArticle($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('postarticle')
            ->where('article', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

}