<?php
/**
 * Created by PhpStorm.
 * User: lishichun
 * Date: 2016/8/29
 * Time: 16:03
 */
require_once("StudentInfo.php");
require_once("MyPdo.php");
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
session_start();
$Obj = $_SESSION['stu'];
$Stu = unserialize($Obj);
echo $Stu->getUserName() . "<br />";
echo $Stu->getUserAge() . "<br />";
echo $Stu->getUserSex() . "<br />";
$myPdo = new myPdo();
echo $myPdo->addInfo($Stu) . "<br />";
$obj = $myPdo->selectInfo();
foreach ($obj as $value) {
    print_r($value);
}

