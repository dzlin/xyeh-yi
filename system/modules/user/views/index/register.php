<?php
$this->pageTitle = '校园二货 - 用户注册';
?>
<h1>用户注册</h1>
<div class="register">
    <form id="form-register" method="post" action="<?php echo $this->createUrl('register') ?>">
        <input type="hidden" value="<?php echo Yii::app()->request->getCsrfToken() ?>" name="YII_CSRF_TOKEN">
        <label for="email">注册邮箱</label>
        <p><input id="email" type="email" name="email" placeholder="您常用的邮箱"></p>
        <label for="password">登陆密码</label>
        <p><input id="password" type="password" name="password" placeholder="字母、数字、下划线，6-24位"></p>
        <label for="repassword">确认密码</label>
        <p><input id="repassword" type="password" name="repassword" placeholder="确认密码"></p>
        <p><input id="submit" type="submit" name="submit" value="register"></p>
    </form>
</div>