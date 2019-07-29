<?php
 include_once ('connect.php');
 $arr=$link->query("select id,title,content,src from news order by id desc limit 0,3");
 while ($row=$arr->fetch()){
     $json[]=$row;
 }
 $link=null;
 echo json_encode($json);