<?php


namespace Admin\controller;

use Admin\model\post\PostRepository;

class PostController extends AdminController
{
    public $postModel;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->postModel = new PostRepository($this->di);
    }

    public function index()
    {
        $this->data['searchText'] = (!empty($this->request->get['s']) ? $this->request->get['s'] : '0');
        $this->data['posts'] = $this->postModel->getPosts();
        $this->view->render('posts', $this->data);
    }

    public function add()
    {
        $params = $this->request->post;

        if (isset($params['post-title'])) {
            $postId = $this->postModel->createPost($params);

            echo $postId;
        }
    }

    public function update()
    {
        $params = $this->request->post;

        if (isset($params['post-title'])) {
            $postId = $this->postModel->updatePost($params);

            echo $postId;
        }
    }

    public function delete()
    {
        $params = $this->request->post;

        if(isset($params['delete_id']) && strlen($params['delete_id']) > 0) {
            $postId = $this->postModel->deletePost($params['delete_id']);

            echo $postId;
        }
    }
}