<?php
include_once ("connect.php");
session_start();/*开启会话*/
$user=$_GET['username'];/*获取登录表单提交过来的数据*/
$pwd=$_GET['pwd'];
$yzm=$_GET['yzm'];
if($yzm==$_SESSION['vCode']){/*当用户输入的验证码和图片验证码相同时*/
    $result=$link->query("select * from `users` where `name`='$user' and pwd='$pwd'");
    $link = null;
    $row = $result->fetch();/*读取从数据库获取的数据*/
    if ($row) {/*如果数据存在，即用户登录成功*/
        $_SESSION['username'] = $row['name'];
        /*将用户名和昵称存在服务器，可以多个页面使用*/
        $_SESSION['nc'] = $row['nickname'];
        $flag=3;
    }else{/*用户名或密码错误*/
        $flag=2;
    }
}else{/*验证码输入错误*/
    $flag=1;
}
echo $flag;
