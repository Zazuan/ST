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
    }

    public function index()
    {
        $this->data['baseUrl'] = Config::item('base_url');
        $this->data['searchText'] = (!empty($this->request->get['s']) ? $this->request->get['s'] : '0');
        $this->data['posts'] = $this->model->post->getPostsWithArticle();
        $this->view->render('posts', $this->data);
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
            $postId = $this->model->post->deletePost($params['delete_id']);

            echo $postId;
        }
    }
}