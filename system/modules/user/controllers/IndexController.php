<?php

/**
 * user 模块 index 控制器
 * 
 * @filename IndexController.php
 * @encoding UTF-8
 * @author dzlin <zhanglindeng@163.com>
 * @link http://www.dzlin.com/
 * @copyright dzlin <zhanglindeng@163.com>
 * @license http://mit-license.org/ MIT License
 * @datetime 2015-12-12  16:10:58
 */

namespace application\modules\user\controllers;

/**
 * Description of IndexController
 *
 * @author dzlin <zhanglindeng@163.com>
 * @since 1.0
 */
class IndexController extends BaseController
{

    public function actions()
    {
        return array(
            'login' => 'application\modules\user\actions\Login',
            'register' => 'application\modules\user\actions\Register',
            'active' => 'application\modules\user\actions\Active',
        );
    }

    public function actionIndex()
    {
        echo '1';
    }

}
