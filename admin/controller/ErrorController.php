<?php

namespace Admin\Controller;

class ErrorController extends AdminController
{
    public function page404()
    {
        $this->view->render('error');
    }
}