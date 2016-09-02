<?php
/**
 * Created by PhpStorm.
 * User: lishichun
 * Date: 2016/8/31
 * Time: 16:18
 */

//$img = base64_decode($base64);
//$a = file_put_contents('./test.jpg', $img);//返回的是字节数

//
//$file_info = var_export($_FILES, true);
//$ok = file_put_contents("./temp/test.png", $file_info);
//if ($ok)
//    exit(json_encode('file_infor'=>'上传成功'));
//exit (json_encode('file_infor'=>'上传失败'));

//demo 解析json
//$json_string='{"id":1,"name":"jb51","email":"admin@jb51.net","interest":["wordpress","php"]} ';
//$obj=json_decode($json_string);
//echo $obj->name; //prints foo
//echo $obj->interest[1]; //prints php

$arr=$_POST;
$arr=$arr['data'];
$imgBase=$arr['code'];
$file_name=$arr['time'];
$type='';
if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $imgBase, $result)){
    $type = $result[2];
    $new_file = "upload/{$file_name}.{$type}";
    if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $imgBase)))){
//        echo  $new_file;
        $c = array('Path'=>$new_file);
        echo json_encode($c);
    }
}
