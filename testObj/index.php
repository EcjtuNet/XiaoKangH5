<?php
require_once ("StudentInfo.php");
/**
 * Created by PhpStorm.
 * User: lishichun
 * Date: 2016/8/29
 * Time: 15:44
 */
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
$StuObj=new StudentInfo("lsc",11,"man");
echo $StuObj->getUserName();
echo $StuObj->getUserAge();
echo $StuObj->getUserSex();
$Obj=serialize($StuObj);
session_start();
$_SESSION['stu']=$Obj;
echo "<script>setTimeout(\" location.href='index_2.php'\",5000)</script>";