<?php

/**
 * Created by PhpStorm.
 * User: lishichun
 * Date: 2016/8/29
 * Time: 15:44
 */
class StudentInfo
{
    private $UserName;
    private $UserAge;
    private $UserSex;
    public function __construct($name,$age,$sex)
    {
        $this->UserName=$name;
        $this->UserAge=$age;
        $this->UserSex=$sex;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * @param mixed $UserName
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }

    /**
     * @return mixed
     */
    public function getUserAge()
    {
        return $this->UserAge;
    }

    /**
     * @param mixed $UserAge
     */
    public function setUserAge($UserAge)
    {
        $this->UserAge = $UserAge;
    }

    /**
     * @return mixed
     */
    public function getUserSex()
    {
        return $this->UserSex;
    }

    /**
     * @param mixed $UserSex
     */
    public function setUserSex($UserSex)
    {
        $this->UserSex = $UserSex;
    }

}