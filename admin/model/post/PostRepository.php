<?php


namespace Admin\model\post;

use Potato\Model;

class PostRepository extends Model
{
    public function getPosts($limit = 4)
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('post')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->sql();

        return $this->db->query($sql);
    }

    public function getPostBySegment($title, $limit = 1)
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('post')
            ->where('title', $title)
            ->limit(1)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function getPostByArticle($articleId, $limit = 5)
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('post')
            ->where('article', $articleId)
            ->limit($limit)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function getPostById($id)
    {
        $post = new Post($id);
        return $post->findOne();
    }

    public function createPost($params)
    {
        $post = new Post;
        $post->setTitle($params['post-title']);
        $post->setContent($params['post-content']);
        $post->setArticle($params['post-article']);
        $post->setStatus($params['post-status']);

        return $post->save();
    }

    public function updatePost($params)
    {
        if (isset($params['post-id'])) {
            $post = new Post($params['post-id']);
            $post->setTitle($params['post-title']);
            $post->setContent($params['post-content']);
            $post->setArticle($params['post-article']);
            $post->setStatus($params['post-status']);
            $post->save();
        }
        return false;
    }




    public function deletePost($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('post')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
}