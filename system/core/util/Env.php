<?php

/**
 * Description of Env.php
 * 
 * @filename Env.php
 * @encoding UTF-8
 * @author dzlin <zhanglindeng@163.com>
 * @link http://www.dzlin.com/
 * @copyright dzlin <zhanglindeng@163.com>
 * @license http://mit-license.org/ MIT License
 * @datetime 2015-12-12  17:22:36
 */

namespace application\core\util;

use Yii;

/**
 * Description of Env
 *
 * @author dzlin <zhanglindeng@163.com>
 * @since 1.0
 */
class Env
{

    /**
     * 获取get或是post数据
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public static function getParam($name, $default = null)
    {
        return Yii::app()->request->getParam($name, $default);
    }

    /**
     * 检查邮箱格式
     * @param string $email        	
     * @return boolean 格式正确返回 true
     */
    public static function checkEmail($email)
    {
        return preg_match("/^([a-zA-Z0-9_\.-]+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/", $email) === 1;
    }

}
