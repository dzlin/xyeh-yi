# xyeh-yii

为了更好地学习 `yii` 试着用 `yii` 重写 `xyeh`

## 安装

- 新建 `library` 目录，并把 `yii 1.1.16` 版代码复制放在这里

- 新建 `assets` 目录，设置可读写权限

- 新建 `system/runtime` 目录，设置读写权限

- 导入 `data/xyeh.sql` 数据库

- 配置 `system/config/db.php` 数据库连接信息

## 邮件发送配置

- 在 `system/config` 目录下新建文件 `email.php`

- 在 `email.php` 写入，并配置你的邮箱

```php
<?php

return array(
    'host' => 'smtp.domain.com',//smtp邮箱服务器地址
    'port' => '456',//端口
    'username' => 'your email username',//邮箱账号
    'password' => 'your email password',//邮箱密码
    'from' => 'username@domain.com',//发件人
    'reply' => 'username@domain.com',//回复邮箱
);
```
## License

MIT