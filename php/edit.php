<?php
include_once ('connect.php');
extract($_GET);
$table = $link->exec("UPDATE `news` SET `title`='$edit_title',`author`='$edit_author',`content`='$edit_content' WHERE id='$edit_id'");
$link = null;
if ($table){
   $flag=1;
} else
    $flag=0;
echo json_encode($flag);