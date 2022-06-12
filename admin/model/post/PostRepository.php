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
            ->where('status', 'Опубликована')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function getPostsWithArticle()
    {
//        $sql = $this->queryBuilder
//            ->select('post.*, article.id AS article_id, article.title AS article_title')
//            ->from('post')
//            ->leftJoin('post', 'postarticle', 'id', 'post')
//            ->innerJoin('postarticle', 'article', 'article', 'id')
//            ->orderBy('id', 'DESC')
//            ->sql();

//        $sql = $this->queryBuilder
//            ->select('post.*, article.id AS article_id, article.title AS article_title')
//            ->from('post')
//            ->leftJoin('post',
//                'postarticle ' . $this->queryBuilder
//                            ->innerJoin('postarticle', 'article', 'article', 'id')
//                            ->sql(),
//                'id', 'post')
//            ->orderBy('id', 'DESC')
//            ->sql();

        $sql = "SELECT post.*, 
                    article.id AS article_id, 
                    article.title AS article_title
            FROM POST
            LEFT JOIN (postarticle
                INNER JOIN article ON postarticle.article = article.id
            ) ON post.id = postarticle.post
            ORDER BY id DESC";

        return $this->db->query($sql);
    }

    public function getPostsWithResources()
    {

//        $sql = $this->queryBuilder
//            ->select("`post`.*,
//                `resource`.id as resource_id,
//                `resource`.title as resource_title,
//                `resource`.content as resource_content,
//                `resource`.type as resource_type,
//                `resource`.parent as resource_parent")
//            ->from('post')
//            ->leftJoin('post','resource','id', 'parent')
//            ->sql();

        $sql = "SELECT post.*, 
                    resource.id AS resource_id, 
                    resource.title AS resource_title, 
                    resource.path AS resource_path,
                    resource.type AS resource_type
            FROM POST
            LEFT JOIN (postresource
                INNER JOIN resource ON postresource.resource = resource.id
            ) ON post.id = postresource.post
            ORDER BY id DESC";

        return $this->db->query($sql);
    }

    public function getFullPosts($limit = 4)
    {
        $sql = "SELECT post.*, 
                    resource.id AS resource_id, 
                    resource.title AS resource_title, 
                    resource.path AS resource_path,
                    resource.type AS resource_type, 
                    article.id AS article_id, 
                    article.title AS article_title,
                    user.username AS user_username,
                    user.email AS user_email
            FROM POST
            LEFT JOIN (postresource
                INNER JOIN resource ON postresource.resource = resource.id
            ) ON post.id = postresource.post
            LEFT JOIN (postarticle
                INNER JOIN article ON postarticle.article = article.id
            ) ON post.id = postarticle.post
            LEFT JOIN user ON post.user = user.id
            ORDER BY id DESC
            LIMIT " . $limit;

        return $this->db->query($sql);
    }

    public function getFullPost($segment)
    {
        $sql = "SELECT post.*, 
                    resource.id AS resource_id, 
                    resource.title AS resource_title, 
                    resource.path AS resource_path,
                    resource.type AS resource_type, 
                    article.id AS article_id, 
                    article.title AS article_title,
                    user.username AS user_username,
                    user.email AS user_email
            FROM post
            LEFT JOIN (postresource
                INNER JOIN resource ON postresource.resource = resource.id
            ) ON post.id = postresource.post
            LEFT JOIN (postarticle
                INNER JOIN article ON postarticle.article = article.id
            ) ON post.id = postarticle.post
            LEFT JOIN user ON post.user = user.id
            WHERE post.segment = '" . $segment . "'
            ORDER BY id DESC
            LIMIT 1";

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

        return $this->db->query($sql, $this->queryBuilder->values)[0] ?? false;
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
        if($postId != 0 and $params['post-article'] != 'undefined') $this->addSubArticle($params);

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
            $this->updateSubArticle($params);

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

        $this->deleteSubArticle($itemId);
        $this->deleteSubResource($itemId);
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function getAmount($array = []): int
    {
        $array = $this->getPosts();
        $amount = 0;

        foreach($array as $elem)
            $amount += 1;

        $newId = 1000+$amount+1;

        foreach($array as $item)
            if ($item->id > $newId) $newId = $item->id + 1;

        return $newId;
    }

    public function getSubArticle($params)
    {
        $sql = $this->queryBuilder
            ->select('article.*')
            ->from('postarticle')
            ->innerJoin('postarticle', 'article', 'article', 'id')
            ->where('post', $params['post-id'])
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function addSubArticle($params)
    {
        $sql = $this->queryBuilder
            ->insert('postarticle')
            ->set(['post'=>$params['post-id'], 'article'=>$params['post-article']])
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function updateSubArticle($params)
    {
        print_r($params);
        if ($params['post-article'] == 'undefined')
            return json_encode([
                'result' => 'undefined'
            ]);
        $sql = $this->queryBuilder
            ->update('postarticle')
            ->set(['post'=>$params['post-id'], 'article'=>$params['post-article']])
            ->where('post', $params['post-id'])
            ->sql();
        return $this->db->execute($sql, $this->queryBuilder->values);
    }

    public function deleteSubArticle($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('postarticle')
            ->where('post', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function addSubResource($params)
    {
        $sql = $this->queryBuilder
            ->insert('postresource')
            ->set(['post'=>$params['post-id'], 'resource'=>$params['resource-id']])
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function deleteSubResource($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('postresource')
            ->where('post', $itemId)
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }
}