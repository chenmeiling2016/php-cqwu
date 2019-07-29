<?php
include_once ('connect.php');
$num = 4;//每一页显示的数据条数
$cPage = $_GET['cPage'];//获取当前页
$start = $cPage * $num;//计算当前页显示的第一条数据的数目
/*从表中查询从开始$start的一共$num条数据*/
$result = $link->query("select * from news order by id desc limit {$start},$num");
$link = null;
while ($row=$result->fetch()){/*每一次读取一条数据*/
    $json[]=$row;/*把数据赋给json数组*/
}
echo json_encode($json);/*把json数组以json格式返回给HTML*/