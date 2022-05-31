<?php

namespace Admin\model\article;

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
        $article = new Article();
        $article->setTitle($params['article-title']);
        $articleID = $article->save();

        return $articleID;
    }

    public function updateArticle($params)
    {
        if (isset($params['article-id'])) {
            $article = new Article($params['article-id']);
            $article->setTitle($params['article-title']);
            $articleID = $article->save();

            return $articleID;
        }
    }

    public function getArticleData($id)
    {
        $article = new Article($id);
        return $article->findOne();
    }


    public function deleteArticle($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('article')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

}