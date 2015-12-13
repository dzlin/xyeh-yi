<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <title><?php echo CHtml::encode($this->pageTitle) ?></title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/static/css/common.css">
    </head>
    <body>
        <?php echo $content ?>
    </body>
</html>