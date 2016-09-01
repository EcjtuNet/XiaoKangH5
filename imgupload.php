<?php
/**
 * Created by PhpStorm.
 * User: lishichun
 * Date: 2016/8/31
 * Time: 16:18
 */
//$img = base64_decode($base64);
//$a = file_put_contents('./test.jpg', $img);//返回的是字节数
$file_info = var_export($_FILES, true);
$ok = file_put_contents("./temp/test.png", $file_info);
if ($ok)
    exit(json_encode('file_infor'=>'上传成功'));
exit (json_encode('file_infor'=>'上传失败'));