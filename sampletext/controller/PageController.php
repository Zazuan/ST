<?php

namespace SampleText\controller;

use Admin\model\page\PageRepository;
use Potato\core\redirect\Redirect;
use SampleText\classes\Page;

class_alias('SampleText\\Classes\\Page', 'Page');

class PageController extends CmsController
{
    const TEMPLATE_PAGE_MASK = 'page-%s';

    public function show($segment)
    {
        $this->load->model('Page', false, 'Admin');

        $pageModel = $this->model->page;

        $page = $pageModel->getPageBySegment($segment);

        if ($page === false or $page->status == 'inactive') {
            // add 404 page
            Redirect::go('/');
        }

        $template = $page->type;

        Page::setStore($page);

        $this->view->render($template);
    }

    public function showPage($segment)
    {
        $this->load->model('Page', false, 'Admin');

        $pageModel = $this->model->page;

        $page = $pageModel->getPageBySegment($segment);

        if ($page === false or $page->status == 'inactive') {
            // add 404 page
            Redirect::go('/');
        }

        $template = 'single';

        Page::setStore($page);

        $this->view->render($template);
    }
}