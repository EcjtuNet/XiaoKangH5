<?php
/**
 * Created by PhpStorm.
 * User: lishichun
 * Date: 2016/8/29
 * Time: 15:45
 */
define('DB_NAME', 'obj');
define('DB_USER', 'root');
define('DB_PASSWD', '');
define('DB_HOST', 'localhost');
define('DB_TYPE', 'mysql');

class myPdo{
    private $db = null;

    public function __construct()
    {
        try {
//            $this->db = new PDO('mysql:host=localhost;dbname=test', "root", "");
            $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWD);
        } catch
        (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            print "连接数据库失败";
            die();
        }
    }
    public function selectInfo(){
        $sql = 'select * from info';
        return $this->db->query($sql);
    }
    public function addInfo($Obj){
        $sql="insert into info values('".$Obj->getUserName()."',".$Obj->getUserAge().",'".$Obj->getUserSex()."')";
        $count=$this->db->exec($sql);
        return $count;
    }
}