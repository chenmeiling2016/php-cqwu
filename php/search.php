<?php
include_once ('connect.php');
$num = 4;
$key = $_GET['key'];
$cPage=$_GET['cPage'];
$start=$cPage*$num;
$table = $link->query("select * from news where title like '%$key%'");
$pages=$table->rowCount();
$table = $link->query("select * from news where title like '%$key%' order by id desc limit {$start},$num");
$json['page']=ceil($pages/$num);
$link = null;
while ($row=$table->fetch()){
    $json['data'][]=$row;
}
echo json_encode($json);