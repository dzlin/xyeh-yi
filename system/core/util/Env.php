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

    /**
     * 发送邮件
     * @param string $to 收件人
     * @param string $subject 邮件主题
     * @param string $content 邮件内容
     * @return boolean
     */
    public static function sendEmail($to, $subject, $content)
    {
        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
        $mailer->Host = Yii::app()->params['email']['host']; // 邮箱服务器地址
        $mailer->port = Yii::app()->params['email']['port']; // 端口
        $mailer->IsSMTP();                       // 使用 SMTP
        $mailer->SMTPAuth = true;                // SMTP 验证
        $mailer->SMTPDebug = false;              // 显示 Debug 信息
        $mailer->Username = Yii::app()->params['email']['username']; // 邮箱帐号
        $mailer->Password = Yii::app()->params['email']['password']; // 邮箱密码
        $mailer->From = Yii::app()->params['email']['from']; // 发件邮箱
        $mailer->AddReplyTo(Yii::app()->params['email']['reply']); // 回复邮箱
        $mailer->AddAddress($to);   // 收件人邮箱
        $mailer->FromName = 'webmaster';             // 发件人名称
        $mailer->CharSet = 'UTF-8';              // 字符编码
        $mailer->ContentType = 'text/html';      // 内容类型
        $mailer->Subject = $subject;            // 标题
        $mailer->Body = $content;         // 内容
        return $mailer->Send();                  // 发送 @return boolean
    }

    /**
     * 生成随机字符串[0-9a-zA-z_~]
     * @param integer $length 字符串长度，默认8
     * @return string
     */
    public static function randStr($length = 8)
    {
        return Yii::app()->securityManager->generateRandomString($length);
    }

}
