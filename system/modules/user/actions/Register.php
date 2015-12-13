<?php

/**
 * Description of Register.php
 * 
 * @filename Register.php
 * @encoding UTF-8
 * @author dzlin <zhanglindeng@163.com>
 * @link http://www.dzlin.com/
 * @copyright dzlin <zhanglindeng@163.com>
 * @license http://mit-license.org/ MIT License
 * @datetime 2015-12-13  14:51:24
 */

namespace application\modules\user\actions;

use application\core\util\Env;
use Yii;

/**
 * 用户注册
 *
 * @author dzlin <zhanglindeng@163.com>
 * @since 1.0
 */
class Register extends Base
{

    public function run()
    {
        if (Yii::app()->request->isPostRequest) {
            if ($this->data()) {
                $this->sendActiveEmail();
                echo 'register success';
                exit;
            }
            $this->controller->error($this->msg);
        }
        $this->controller->render('register');
    }

    /**
     * 发送激活邮件
     * @return boolean
     */
    protected function sendActiveEmail()
    {
        $subject = '用户账号激活';
        $content = '您好，请您点击下面的链接完成注册...';
        return Env::sendEmail($this->email, $subject, $content);
    }

}
