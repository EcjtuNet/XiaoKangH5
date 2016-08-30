<?php
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
require_once("StudentInfo.php");
/**
 * Created by PhpStorm.
 * User: lishichun
 * Date: 2016/8/29
 * Time: 15:44
 */
session_start();
$Obj = $_SESSION['stu'];
$StuObj = unserialize($Obj);
echo $StuObj->getUserName();
$StuObj->setUserName("coderli");
$Obj = serialize($StuObj);
$_SESSION['stu'] = $Obj;
echo "<script>setTimeout(\" location.href='index_3.php'\",5000)</script>";