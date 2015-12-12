<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <title>校园二货 -- 用户登录</title>
    </head>
    <body>
        <h1>用户登录</h1>
        <form method="post" action="<?php echo $this->createUrl('login') ?>">
            <label for="email">邮箱</label>
            <p><input id="email" type="email" name="email" placeholder="登陆邮箱"></p>
            <label for="password">密码</label>
            <p><input id="password" type="password" name="password" placeholder="登陆密码"></p>
            <p><input type="submit" name="submit" value="login"></p>
        </form>
    </body>
</html>
