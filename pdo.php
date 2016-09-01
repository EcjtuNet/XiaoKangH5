<?php

/**
 * Created by PhpStorm.
 * User: lishichun
 * Date: 2016/8/28
 * Time: 21:33
 */
define('DB_NAME', 'cbl');
define('DB_USER', 'root');
define('DB_PASSWD', '123456');
define('DB_HOST', '127.0.0.1');
define('DB_TYPE', 'mysql');

class MyPdo
{
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

    public function add($id,$name,$subject,$sex,$grade,$message,$imgurl)
    {
        $sql="INSERT INTO `info`VALUES ($id,'".$subject."','".$sex."','".$name."','".$grade."','".$message."','".$imgurl."')";
        $this->db->exec($sql);
        return $sql;
    }
    public function select($serverid){
        $sql = "select * from info where userId='".$serverid."'";
        $res = $this->db->query($sql);
        $res_arr =$res->fetchAll();
         return $res_arr;
    }

//    public function show(){
//        $sql = 'select * from test';
//        foreach ( $this->db->query($sql) as $value)
//        {
//            echo $value[col];
//        };
//    }
//    public function keepImgId($imgId){
//        $this->db.exec("insert into test VALUES (". .)")
//    }

//$rs = $db->query("SELECT* FROM test");
//$result_arr = $rs->fetchAll();
//print_r($result_arr);

//$count = $db->exec("INSERT INTO fooSET name = 'heiyeluren',gender='男',time=NOW()");
//echo $count;
}