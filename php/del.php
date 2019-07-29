<?php
$id = $_GET['id'];
include_once ('connect.php');
$row = $link->exec("DELETE  FROM `news` WHERE id=$id");
$link = null;

echo $row;