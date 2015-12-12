<?php

$yii=dirname(__FILE__).'/library/yii.php';
$config=dirname(__FILE__).'/system/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
