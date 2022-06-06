<?php


namespace Admin\controller;

use Admin\model\article\ArticleRepository;
use Potato\core\config\Config;

class ArticleController extends AdminController
{

    public function __construct($di)
    {
        parent::__construct($di);

        $this->load->model('Post', false, 'Admin');
        $this->load->model('Article', false, 'Admin');

    }

    public function index()
    {
        $this->data['searchText'] = (!empty($this->request->get['s']) ? $this->request->get['s'] : '0');
        $this->data['articles'] = $this->model->article->getArticles();
        $this->data['posts'] = $this->model->post->getPosts();
        $this->data['baseUrl'] = Config::item('base_url');
        $this->view->render('articles', $this->data);
    }

    public function add()
    {
        $params = $this->request->post;

        print_r($params);

        if (isset($params['article-title'])) {
            $pageId = $this->model->article->createArticle($params);

            echo $pageId;
        }
    }

    public function update()
    {
        $params = $this->request->post;

        if (isset($params['article-title'])) {
            $pageId = $this->articleModel->updateArticle($params);

            echo $pageId;
        }
    }

    public function delete()
    {
        $params = $this->request->post;

        if(isset($params['delete_id']) && strlen($params['delete_id']) > 0) {
            $pageId = $this->articleModel->deleteArticle($params['delete_id']);

            echo $pageId;
        }
    }
}