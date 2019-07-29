<?php
include_once ('connect.php');
$id=$_GET['id'];
$result=$link->query("select * from news where id=".$id);
$row=$result->fetch();
$link=null;
echo json_encode($row);
