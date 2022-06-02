<?php

namespace Admin\controller;

use Admin\model\page\PageRepository;
use Potato\core\config\Config;

class PageController extends AdminController
{
    public $pageModel;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->pageModel = new PageRepository($this->di);
    }

    public function index()
    {
        $this->data['baseUrl'] = Config::item('base_url');
        $this->data['searchText'] = (!empty($this->request->get['s']) ? $this->request->get['s'] : '0');
        $this->data['pages'] = $this->pageModel->getPages();
        $this->view->render('pages', $this->data);
    }

    public function add()
    {
        $params = $this->request->post;

        if (isset($params['page-title'])) {
            $pageId = $this->pageModel->createPage($params);

            echo $pageId;
        }
    }

    public function update()
    {
        $params = $this->request->post;

        if (isset($params['page-title'])) {
            $pageId = $this->pageModel->updatePage($params);
        }
    }


    public function delete()
    {
        $params = $this->request->post;

        if(isset($params['delete_id']) && strlen($params['delete_id']) > 0) {
            $pageId = $this->pageModel->deletePage($params['delete_id']);
        }
    }
}