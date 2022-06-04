<?php

namespace Admin\controller;

use Admin\model\page\Page;
use Potato\core\template\Theme;
use SampleText\model\menuItem\MenuItemRepository;
use SampleText\model\menu\MenuRepository;

class MenuController extends AdminController
{

    public $menuModel;
    public $menuItemsModel;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->menuModel = new MenuRepository($this->di);
        $this->menuItemsModel = new MenuItemRepository($this->di);

    }

    public function index()
    {
        $this->data['menuId'] = (!empty($this->request->get['menu_id']) ? $this->request->get['menu_id'] : '0');
        $this->data['menus'] = $this->menuModel->getList();
        $this->data['editMenu'] = $this->menuItemsModel->getItems($this->data['menuId']);

        $this->view->render('menus', $this->data);
    }

    public function add()
    {
        $params = $this->request->post;

        if (isset($params['menu-title']) && strlen($params['menu-title']) > 0) {
            $addMenu = $this->menuModel->createMenu($params);

            echo $addMenu;
        }
    }

    public function update()
    {
        $params = $this->request->post;

        if (isset($params['menu-title'])) {
            $menuId = $this->menuModel->updateMenu($params);

            echo $menuId;
        }
    }

    public function delete()
    {
        $params = $this->request->post;

        if(isset($params['delete_id']) && strlen($params['delete_id']) > 0) {
            $menuId = $this->menuModel->deleteMenu($params['delete_id']);
            $menuItemId = $this->menuItemsModel->removeByMenuId($params['delete_id']);

            echo $menuId;
        }
    }

    public function addItem()
    {
        $params = $this->request->post;

        if (isset($params['menu_id']) && strlen($params['menu_id']) > 0) {
            $id = $this->menuItemsModel->add($params);

            $item = new \stdClass;
            $item->id   = $id;
            $item->title = 'New Item';
            $item->link = '#';

            Theme::block('components/m-items', [
                'item' => $item
            ]);

            print_r($item);
        }
    }

    public function deleteItem()
    {
        $params = $this->request->post;

        if (isset($params['delete_id']) && strlen($params['delete_id']) > 0) {
            $removeItem = $this->menuItemsModel->remove($params['delete_id']);

            echo $removeItem;
        }
    }

    public function updateItem()
    {
        $params = $this->request->post;

        if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
            $updateItem = $this->menuItemsModel->update($params);

            print_r($updateItem);
        }
    }

    public function sortItems()
    {
        $params = $this->request->post;

        if (isset($params['data']) && !empty($params['data'])) {
            $this->menuItemsModel->sort($params);

        }
    }

}