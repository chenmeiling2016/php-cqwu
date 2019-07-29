<?php
include_once('connect.php');
$result = $link->query("select * from news");
$row=$result->rowCount();
echo $row;