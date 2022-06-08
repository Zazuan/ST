<?php

namespace Admin\controller;

use Admin\model\page\PageRepository;
use Potato\core\config\Config;

class PageController extends AdminController
{

    public function __construct($di)
    {
        parent::__construct($di);

        $this->load->model('Page', false, 'Admin');
    }

    public function index()
    {
        $this->data['baseUrl'] = Config::item('base_url');
        $this->data['searchText'] = (!empty($this->request->get['s']) ? $this->request->get['s'] : '0');
        $this->data['pages'] = $this->model->page->getPages();
        $this->view->render('pages', $this->data);
    }

    public function add()
    {
        $params = $this->request->post;

        if (isset($params['page-title'])) {
            $pageId = $this->model->page->createPage($params);

            echo $pageId;
        }
    }

    public function update()
    {
        $params = $this->request->post;

        if (isset($params['page-title'])) {
            $pageId = $this->model->page->updatePage($params);
        }
    }


    public function delete()
    {
        $params = $this->request->post;

        if(isset($params['delete_id']) && strlen($params['delete_id']) > 0) {
            $pageId = $this->model->page->deletePage($params['delete_id']);
        }
    }
}