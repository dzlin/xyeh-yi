<?php

/**
 * Description of Base.php
 * 
 * @filename Base.php
 * @encoding UTF-8
 * @author dzlin <zhanglindeng@163.com>
 * @link http://www.dzlin.com/
 * @copyright dzlin <zhanglindeng@163.com>
 * @license http://mit-license.org/ MIT License
 * @datetime 2015-12-12  16:36:47
 */

namespace application\modules\user\actions;

use application\core\Action;
use application\core\util\Env;

/**
 * Description of Base
 *
 * @author dzlin <zhanglindeng@163.com>
 * @since 1.0
 */
class Base extends Action
{

    /**
     * 注册激活码长度
     */
    const ACTIVE_CODE_LENGTH = 32;

    /**
     * 登陆邮箱
     * @var string
     */
    protected $email = null;

    /**
     * 登陆密码
     * @var string
     */
    protected $password = null;

    /**
     * 确认密码
     * @var string
     */
    protected $repassword = null;

    /**
     * 提示信息
     * @var string
     */
    protected $msg = null;

    /**
     * 用户id
     * @var integer
     */
    protected $uid = 0;

    /**
     * 邮箱格式验证
     */
    protected function email()
    {
        return Env::checkEmail($this->email);
    }

    /**
     * 密码格式验证
     */
    protected function password()
    {
        return preg_match("/^\w{6,24}$/", $this->password) === 1;
    }

    /**
     * 加密登陆密码
     * @return string
     */
    protected function encryptPassword()
    {
        return md5(sha1($this->password));
    }

    /**
     * 登陆或是注册表单数据
     * @return boolean
     */
    protected function data()
    {
        $this->email = htmlspecialchars(trim(Env::getParam('email')));
        $this->password = htmlspecialchars(trim(Env::getParam('password')));
        $this->repassword = htmlspecialchars(trim(Env::getParam('repassword')));
        return $this->dataCheck();
    }

    /**
     * 检查登陆数据
     */
    protected function dataCheck()
    {
        if (!$this->email()) {
            $this->msg = '邮箱格式错误';
            return false;
        }
        if (!$this->password()) {
            $this->msg = '密码格式错误';
            return false;
        }
        if ($this->controller->action->id == 'register' && !$this->repassword()) {
            $this->msg = '两次密码不一致';
            return false;
        }
        return true;
    }

    /**
     * 两次密码是否一致
     * @return boolean
     */
    protected function repassword()
    {
        if ($this->password !== null && $this->repassword !== null) {
            return $this->password === $this->repassword;
        }
        return false;
    }

}
