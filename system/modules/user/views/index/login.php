<?php
$this->pageTitle = '校园二货 - 用户登录';
?>
<link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/css/user.css">
<link rel="stylesheet" href="<?php echo $this->assetsUrl; ?>/css/user_index_login.css">
<h1>用户登录</h1>
<div class="login">
    <form method="post" action="<?php echo $this->createUrl('login') ?>">
        <input type="hidden" value="<?php echo Yii::app()->request->getCsrfToken(); ?>" name="YII_CSRF_TOKEN">
        <label for="email">邮箱</label>
        <p><input id="email" type="email" name="email" placeholder="登陆邮箱"></p>
        <label for="password">密码</label>
        <p><input id="password" type="password" name="password" placeholder="登陆密码"></p>
        <p><input type="submit" name="submit" value="login"></p>
    </form>
</div>
