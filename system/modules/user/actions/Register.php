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
use application\models\User;
use application\models\UserActive;
use Exception;
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
                $userModel = new User();
                if (!$userModel->existsEmail($this->email)) {// 邮箱是否注册过
                    $transaction = $userModel->dbConnection->beginTransaction();
                    try {
                        $userModel->email = $this->email;
                        $userModel->password = $this->encryptPassword();
                        $userModel->register_time = time();
                        if ($userModel->save()) {
                            $this->uid = $userModel->getPrimaryKey();
                            if ($this->sendActiveEmail()) {
                                $transaction->commit();
                                die('register success');
                            }
                        }
                    } catch (Exception $exc) {
                        file_put_contents(date('YmdHis') . 'register.txt', var_export($exc->getMessage()));
                        $transaction->rollback();
                    }
                }
                $this->controller->error('该邮箱已经注册过');
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
        $subject = '用户激活';
        $viewFile = 'application.modules.user.views.index.email';
        $viewFile = Yii::getPathOfAlias($viewFile) . '.php';
        $params = array(
            'email' => $this->encryptEmail(),
            'code' => $this->code(),
        );
        $data = array(
            'url' => $this->controller->createAbsoluteUrl('/user/index/active', $params),
        );
        $content = $this->controller->renderFile($viewFile, $data, true);
        return Env::sendEmail($this->email, $subject, $content);
    }

    /**
     * 对 email 加密并进行 base64 编码
     * @return string
     */
    protected function encryptEmail()
    {
        return base64_encode(Yii::app()->securityManager->encrypt($this->email));
    }

    /**
     * 生成用户激活码并加密返回
     * @return string
     */
    protected function code()
    {
        $code = Env::randStr(self::ACTIVE_CODE_LENGTH);
        $model = new UserActive();
        $model->code = $code;
        $model->uid = $this->uid;
        if ($model->save()) {
            return base64_encode(Yii::app()->securityManager->encrypt($code));
        }
    }

}
