<?php
namespace application\modules\main\controllers;

use application\core\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }
}
