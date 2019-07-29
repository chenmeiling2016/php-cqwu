<?php
session_start();
unset($_SESSION['username']);//销毁用户名
unset($_SESSION['nc']);//销毁昵称
echo json_encode(true);//返回结果
