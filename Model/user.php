<?php

class user
{
    public function __construct()
    {
    }
    function getEmail($email)
    {
        $db=new connect();
        $select = "select * from khachhang1 where email='$email' ";
        echo $select;
        $result=$db->getInstance($select);
        return $result;
    }
    function updateEmail($emailold, $codenew)
    {
        $db=new connect();
        $query="update khachhang1 set matkhau='$codenew' where email='$emailold'";
        echo $query;
        $db->exec($query);
    }

    function addUser($tenkh, $user, $mk, $email, $sdt, $add)
    {
        $db = new connect();
        $query = "INSERT INTO khachhang1 VALUES (null,'$tenkh','$user','$mk' ,'$email' ,'$add','$sdt',default)";
//        echo $query;
        $db->exec($query);
    }

    function find($user)
    {
        $db = new connect();
        $query = "SELECT * FROM khachhang1 WHERE username like '$user'";
//        echo $query;
        return $db->getinstance($query);
    }

    function loginuser($username, $pass)
    {
        $db = new connect();
        $select = "SELECT * FROM khachhang1 WHERE username = '$username' and matkhau = '$pass' ";
        $result = $db->getlist($select);
        $set = $result->fetch();
        return $set;
    }
    function  updatePass($makh,$new_pass){
        $db = new connect();
        $new_pass = md5($new_pass);
        $update = "UPDATE khachhang1 SET matkhau ='$new_pass' WHERE makh=$makh";
        $db->exec($update);
    }
}
