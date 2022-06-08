<?php


namespace Admin\controller;

use Admin\model\post\PostRepository;
use Potato\core\config\Config;

class PostController extends AdminController
{
    public $postModel;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->load->model('Post', false, 'Admin');
        $this->load->model('Resource', false, 'Admin');
        $this->load->model('User', false, 'Admin');
        $this->load->model('Article', false, 'Admin');
    }

    public function index()
    {
        $this->data['baseUrl'] = Config::item('base_url');
        $this->data['searchText'] = (!empty($this->request->get['s']) ? $this->request->get['s'] : '0');
        $posts = $this->model->post->getPostsWithArticle();

        //refactor: move TO post MODEL
        foreach ($posts as $post) {
            if ($post->article_id == null) $post->article_title = 'Отсутствует';
        }

        $this->data['articles'] = $this->model->article->getArticles();
        $this->data['posts'] = $posts;

        $this->view->render('posts', $this->data);
    }

    public function showPost($id)
    {
        $this->data['baseUrl'] = Config::item('base_url');
        $this->data['post'] = $this->model->post->getPostById($id);
        $this->data['user'] = $this->model->user->getUserById($this->data['post']->user);
        $this->data['resources'] = $this->model->resource->getResources();
        $this->data['usedResources'] = $this->model->resource->getResourcesByParent($this->data['post']->id);
        $this->data['articles'] = $this->model->article->getArticles();

        $this->view->render('components/full-post', $this->data);
    }

    public function add()
    {
        $params = $this->request->post;

        if (isset($params['post-title'])) {
            $postId = $this->model->post->createPost($params);

            echo $postId;
        }
    }

    public function update()
    {
        $params = $this->request->post;

        if (isset($params['post-title'])) {
            $postId = $this->model->post->updatePost($params);

            echo $postId;
        }
    }

    public function delete()
    {
        $params = $this->request->post;

        if(isset($params['delete_id']) && strlen($params['delete_id']) > 0) {
            $resourceId = $this->model->resource->deleteResourceByParent($params['delete_id']);
            $postId = $this->model->post->deletePost($params['delete_id']);

            echo $postId . ':' . $resourceId;
        }
    }

    public function addResource()
    {
        $params = $this->request->post;

        if(isset($params['resource-id']) && isset($params['post-id']) && strlen($params['resource-id']) > 0) {
            $resourceId = $this->model->post->addSubResource($params);

            echo $resourceId;
        }
    }
}