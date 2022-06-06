<?php

namespace SampleText\controller;

use Potato\core\redirect\Redirect;
use SampleText\classes\Page;

class_alias('SampleText\\Classes\\Page', 'Page');

class PageController extends CmsController
{
    const TEMPLATE_PAGE_MASK = 'page-%s';

    public function __construct($di)
    {
        parent::__construct($di);
        $this->load->model('Page', false, 'Admin');
        $this->load->model('Post', false, 'Admin');
        $this->load->model('Article', false, 'Admin');
        $this->load->model('Resource', false, 'Admin');
    }

    public function index()
    {
        $postModel = $this->model->post;
        $articleModel = $this->model->article;
        $resourceModel = $this->model->resource;

        $this->data['posts'] = $postModel->getPostsResources();
        $this->data['articles'] = $articleModel->getArticles();

        $this->view->render('index', $this->data);


    }

    public function show($segment)
    {
        $pageModel = $this->model->page;
        $postModel = $this->model->post;

        $page = $pageModel->getPageBySegment($segment);
        $this->data['posts'] = $postModel->getPosts();

        if ($page === false or $page->status == 'inactive') {
            // add 404 page
            Redirect::go('/404');
        }

        $template = $page->type;

        Page::setStore($page);

        $this->view->render($template);
    }

    public function showPost($segment)
    {
        $postModel = $this->model->post;
        $articleModel = $this->model->article;
        $resourceModel = $this->model->resource;

        if (is_int($segment)) {
            $post = $postModel->getPostById($segment);
        } else {
            $post = $postModel->getPostBySegment($segment);
        }

        $this->data['article'] = $articleModel->getArticleById($post[0]->article);
        $this->data['resources'] = $resourceModel->getResourcesByParent($post[0]->id);
        $this->data['post'] = $post;

        if (empty($post) or $post[0]->status == 'inactive') {
            Redirect::go('/404');
        }

        $template = 'single';
        Page::setStore($post);

        $this->view->render($template, $this->data);
    }

    public function showArticle($segment)
    {
        $articleModel = $this->model->article;
        $postModel = $this->model->post;

        $article = $articleModel->getArticleBySegment($segment);
        $posts = $postModel->getPostByArticle($article->id);

        $this->data['article'] = $article;
        $this->data['posts'] = $posts;

        if (empty($article)) {
            Redirect::go('/404');
        }

        $template = 'category';
        Page::setStore($article);

        $this->view->render($template, $this->data);
    }
}