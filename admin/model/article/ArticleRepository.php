<?php

namespace Admin\model\article;

use Potato\helper\Text;
use Potato\Model;

class ArticleRepository extends Model
{
    public function getArticles()
    {
        $sql = $this->queryBuilder
            ->select('article')
            ->from('post_article')
            ->orderBy('article', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function createArticle($params)
    {
        $article = new Article();
        $article->setTitle($params['article-title']);
        $article->setSegment(Text::transliteration($params['article-title']));
        return $article->save();;
    }

    public function updateArticle($params)
    {
        if (isset($params['article-id'])) {
            $article = new Article($params['article-id']);
            $article->setTitle($params['article-title']);
            $article->setSegment(Text::transliteration($params['article-title']));

            return $article->save();
        }
        return false;
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