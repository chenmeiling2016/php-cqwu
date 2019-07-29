<?php
include_once ('connect.php');
$result = $link->query("select id,content,src from news order by id desc limit 0,6");
$link = null;
while ($row=$result->fetch()){
    $json[]=$row;
}
echo json_encode($json);