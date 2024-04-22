<?php
    class dangnhap{
        function __construct(){}
        // phương thức kiểm tra thông tin admin
        function getAdmin($user,$pass)
        {
            $db=new connect();
            $select="select * from admin where user='$user' and password='$pass'";
            echo $select;
            $result=$db->getInstance($select);
            return $result;
        }
        function  updatePass($admin,$new_pass){
            $db = new connect();
            $update = "UPDATE admin SET password ='$new_pass' WHERE user='$admin'";
            $db->exec($update);
        }
    }
?>