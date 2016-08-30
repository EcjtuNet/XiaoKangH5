<?php
require_once("StudentInfo.php");
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
session_start();
$Obj = $_SESSION['stu'];
$Stu = unserialize($Obj);
echo $Stu->getUserName() . "<br />";
echo $Stu->getUserAge() . "<br />";
echo $Stu->getUserSex() . "<br />";
echo "<script>setTimeout(\" location.href='index_4.php'\",5000)</script>";
