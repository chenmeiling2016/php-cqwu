<?php
include_once ("connect.php");
$user=$_GET['username'];//获取表单提交的数据
$pwd=$_GET['pwd'];
$repwd=$_GET['repwd'];
$nc=$_GET['nc'];
$row=$link->query("select * from `users` where `name`='$user'");
/*查询数据库中是否存在用户名相同的用户*/
if ($row->rowCount()){
    $flag=1;/*存在用户名相同，即用户名冲突*/
}else if ($pwd!=$repwd){
   $flag=2;/*两次密码不相同*/
}else{/*插入数据进数据库*/
    $row=$link->exec("insert into`users`( `name`,  `pwd`，`nc`) values ('$user','$pwd','$nc')");
    session_start();/*打开会话，将用户名和昵称存起来*/
    $_SESSION['username']=$user;
    $_SESSION['nc']=$nc;
    $flag=3;/*注册成功标志*/
}
echo $flag;
