<?php
include_once ('connect.php');
$result = $link->query("select id,title from news order by id desc");
$link = null;
while ($row=$result->fetch()){
    $json[]=$row;
}
echo json_encode($json);