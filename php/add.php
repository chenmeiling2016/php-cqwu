<?php
extract($_POST);
$date = date('Y-m-d');
$file_name = $_FILES['image']['name'];//获取缓存区图片,格式不能变
$type = array("jpg", "gif", 'png', 'bmp');//允许选择的图片类型
$ext = explode(".", $file_name);//拆分获取图片名
$ext = $ext[count($ext) - 1];//取图片的后缀名
if (in_array($ext,$type)){
    do{
        $new_name = get_file_name(6).'.'.$ext;
        $path='upload/'.$new_name;
    }while (file_exists("../" . $path));//检查图片是否存在文件夹，存在返回ture,否则false
    $temp_file=$_FILES['image']['tmp_name'];//获取服务器里图片
    include_once ('connect.php');
    $result = $link->exec("INSERT INTO `news`(`title`,`author`, `content`, `src`,`time`) VALUES ('$title','$author','$content','$path','$date')");
    if ($result){
        move_uploaded_file($temp_file,"../" .$path);//移动临时文件到目标路径
        $arr['flag']=1;
        $arr['detail']=[$title,$author,$content,$path];
    }else{
        $arr['flag']=2;
    }
}else{
    $arr['flag']=3;
}
function get_file_name($len)
{
    $new_file_name = 'A_';
    $chars = "1234567890qwertyuiopasdfghjklzxcvbnm";//随机生成图片名
    for ($i = 0; $i < $len; $i++) {
        $new_file_name .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $new_file_name;
}
echo json_encode($arr);