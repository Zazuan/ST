<?php


namespace Admin\model\post;

use Potato\Model;

class PostRepository extends Model
{
    public function getPosts()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('post')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function createPost($params)
    {
        $post = new Post;
        $post->setTitle($params['post-title']);
        $post->setContent($params['post-content']);
        $postID = $post->save();

        return $postID;
    }

    public function updatePost($params)
    {
        if (isset($params['post-id'])) {
            $post = new Post($params['post-id']);
            $post->setTitle($params['post-title']);
            $post->setContent($params['post-content']);
            $post->save();
        }
        return 0;
    }

    public function getPostData($id)
    {
        $post = new Post($id);
        return $post->findOne();
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