<?php

namespace SampleText\controller;

use Admin\model\page\PageRepository;
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

        if ($page === false) {
            // add 404 page
            header('Location: /');
            exit;
        }

        $template = 'page';
        if ($page->type !== 'page') {
            $template = sprintf(self::TEMPLATE_PAGE_MASK, $page->type);
        }

        Page::setStore($page);

        $this->view->render($template);
    }
}