<?php

/**
 * Description of Login.php
 * 
 * @filename Login.php
 * @encoding UTF-8
 * @author dzlin <zhanglindeng@163.com>
 * @link http://www.dzlin.com/
 * @copyright dzlin <zhanglindeng@163.com>
 * @license http://mit-license.org/ MIT License
 * @datetime 2015-12-12  16:37:38
 */

namespace application\modules\user\actions;

use Yii;

/**
 * Description of Login
 * 
 * @author dzlin <zhanglindeng@163.com>
 * @since 1.0
 */
class Login extends Base
{

    public function run()
    {
        if (Yii::app()->request->isPostRequest) {
            if ($this->data()) {
                die('ok');
            }
            $this->controller->error($this->msg);
        }
        $this->controller->render('login');
    }

}
