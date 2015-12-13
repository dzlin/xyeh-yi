<?php

/**
 * Description of Active.php
 * 
 * @filename Active.php
 * @encoding UTF-8
 * @author dzlin <zhanglindeng@163.com>
 * @link http://www.dzlin.com/
 * @copyright dzlin <zhanglindeng@163.com>
 * @license http://mit-license.org/ MIT License
 * @datetime 2015-12-13  19:26:03
 */

namespace application\modules\user\actions;

use application\core\util\Env;
use Yii;

/**
 * 用户激活
 *
 * @author dzlin <zhanglindeng@163.com>
 * @since 1.0
 */
class Active extends Base
{

    /**
     * 激活码
     * @var string
     */
    protected $code = null;

    public function run()
    {
        $enEmail = Env::getParam('email');
        $this->email = $this->decryptEmail($enEmail);
        $enCode = Env::getParam('code');
        $this->code = $this->decryptCode($enCode);
    }

    /**
     * 解密加密后的邮箱
     * @param string $enEmail
     * @return string
     */
    protected function decryptEmail($enEmail)
    {
        return base64_decode(Yii::app()->securityManager->decrypt($enEmail));
    }

    /**
     * 解密加密后的激活码
     * @param string $enCode
     * @return string
     */
    protected function decryptCode($enCode)
    {
        return base64_decode(Yii::app()->securityManager->decrypt($enCode));
    }

    /**
     * 验证激活
     * @return boolean 激活成功返回true
     */
    protected function active()
    {
        return false;
    }

}
