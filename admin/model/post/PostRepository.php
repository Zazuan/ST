<?php


namespace Admin\model\post;

use Potato\helper\Cookie;
use Potato\helper\Text;
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

    public function getPostsWithArticle()
    {
        $sql = $this->queryBuilder
            ->select('post.*, article.title AS article_title')
            ->from('post')
            ->innerJoin('post', 'postarticle', 'id', 'post')
            ->innerJoin('postarticle', 'article', 'article', 'id')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function getPostsResources()
    {
//        $sql = "SELECT `post`.*,
//                `resource`.id as resource_id,
//                `resource`.title as resource_title,
//                `resource`.content as resource_content,
//                `resource`.type as resource_type,
//                `resource`.parent as resource_parent  FROM `post`
//                LEFT JOIN `resource`
//                ON `post`.`id` = `resource`.`parent`
//                LIMIT " . $limit . "
//        ";
        $sql = $this->queryBuilder
            ->select("`post`.*, 
                `resource`.id as resource_id, 
                `resource`.title as resource_title, 
                `resource`.content as resource_content, 
                `resource`.type as resource_type, 
                `resource`.parent as resource_parent")
            ->from('post')
            ->leftJoin('post','resource','id', 'parent')
            ->sql();
        return $this->db->query($sql);
    }

    public function getPostBySegment($segment, $limit = 1)
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('post')
            ->where('segment', $segment)
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
        $params['post-id'] = $this->getAmount();
        $params['user'] = Cookie::get('auth_authorized');

        $post = new Post($params['post-id']);
        $post->setTitle($params['post-title']);
        $post->setContent($params['post-content']);
        $post->setStatus($params['post-status']);
        $post->setSegment(Text::transliteration($params['post-title']));
        $post->setUser($params['user']);

        $postId = $post->insert();
        if($postId != 0) $this->addArticle($params);

        return $postId;
    }

    public function updatePost($params)
    {
        if (isset($params['post-id'])) {
            $post = new Post($params['post-id']);
            $post->setTitle($params['post-title']);
            $post->setContent($params['post-content']);
            $post->setSegment($params['post-segment']);
            $post->setStatus($params['post-status']);

            $postId = $post->update();
            $this->updateArticle($params);

            return $postId;
        }
        return 'updatePost error';
    }

    public function deletePost($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('post')
            ->where('id', $itemId)
            ->sql();

        $this->deleteArticle($itemId);
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function getAmount($array = []): int
    {
        $array = $this->getPosts();
        $amount = 0;
        foreach($array as $elem)
            $amount += 1;
        return 1000+$amount+1;
    }

    public function addArticle($params)
    {
        $sql = $this->queryBuilder
            ->insert('postarticle')
            ->set(['post'=>$params['post-id'], 'article'=>$params['post-article']])
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function updateArticle($params)
    {
        $sql = $this->queryBuilder
            ->update('postarticle')
            ->set(['post'=>$params['post-id'], 'article'=>$params['post-article']])
            ->where('post', $params['post-id'])
            ->sql();
        return $this->db->execute($sql, $this->queryBuilder->values);
    }

    public function deleteArticle($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('postarticle')
            ->where('post', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
}