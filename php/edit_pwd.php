<?php
include_once ('connect.php');
extract($_GET);
session_start();
$username=$_SESSION['username'];
$table = $link->query("select pwd from users where `name`='$username'");
$pwd=$table->fetch()[0];
if ($old_pwd==$pwd){
    if ($new_pwd==$re_pwd){
        $table = $link->exec("UPDATE `users` SET `pwd`='$new_pwd' WHERE `name`='$username'");
        $link = null;
        $flag=1;
    }else{
        $flag=2;
    }
}else{
    $flag=3;
}
echo json_encode($flag);