<?php
include_once ('connect.php');
$title=$_GET['title'];
$table = $link->query("select * from news where title like '%$title%' order by id desc  limit 1");
$link = null;
if ($row=$table->fetch()){
    $result['flag']=1;
    $result['data']=$row;
} else
    $result['flag']=0;
echo json_encode($result);