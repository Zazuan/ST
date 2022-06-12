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
        $this->load->model('User', false, 'Admin');
    }

    public function index()
    {
        $this->data['posts'] = $this->model->post->getPosts();

        foreach ($this->data['posts'] as $this->data['post']) {
            $this->data['post']->article = $this->model->article->getArticleByParent($this->data['post']->id);
            $this->data['post']->resources = $this->model->resource->getResourcesByParent($this->data['post']->id);
            $this->data['post']->user = $this->model->user->getUserById($this->data['post']->user);
        }

        $template = 'index';

        $this->view->render($template, $this->data);

    }

    public function show($segment)
    {
        $page = $this->model->page->getPageBySegment($segment);
        //$this->data['posts'] = $this->model->post->getPosts();

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

        $post = $this->model->post->getPostBySegment($segment);
        $articles = $this->model->article->getArticleByParent($post->id);
        $resources = $this->model->resource->getResourcesByParent($post->id);
        $user = $this->model->user->getUserById($post->user);
        $relatedPosts = $this->model->post->getFullPosts(3);

        $this->data['post'] = $post;
        $this->data['post']->articles = $articles;
        $this->data['post']->resources = $resources;
        $this->data['post']->user = $user;
        $this->data['relatedPosts'] = $relatedPosts;

        if (empty($post) or $post->status == 'Черновик') {
            Redirect::go('/404');
        }

        $template = 'single';
        Page::setStore($post);

        $this->view->render($template, $this->data);
    }

    public function showArticle($segment)
    {
        $article = $this->model->article->getArticleBySegment($segment);
        $posts = $this->model->post->getPostByArticle($article->id);

        $this->data['article'] = $article;
        $this->data['article']->posts = $posts;

        if (empty($article)) {
            Redirect::go('/404');
        }

        $template = 'category';
        Page::setStore($article);

        $this->view->render($template, $this->data);
    }
}