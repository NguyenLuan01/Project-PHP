<?php

$act = "changepass";
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
switch ($act){
    default :
        include "View/dangnhap.php";
        break;
    case 'changepass_action':
    $tam = true;
    $new_passErr=$old_passErr="";
    if(empty($_POST['old_pass'])){
        $old_passErr ="Vì bảo mật yêu cầu nhập mật khẩu hiện tại";
        $tam =false;
    } else{
        if( md5($_POST['old_pass']) != $_SESSION['mk']){
            $tam =false;
            $old_passErr = "mật khẩu sai, yêu cầu điền mật khẩu";
        }

    }
    //===========================================================
    if(empty($_POST['new_pass'])){
        $new_passErr = "Yêu cầu điền mật khẩu mới";
        $tam = false;
    }
        //===========================================================
        if ($tam){
            $new_pass =$_POST['new_pass'];
            $new_pass =md5($new_pass);
            $user = new dangnhap();
            $user->updatePass($_SESSION['admin'],$new_pass);
            echo "<script>alert ('thay đổi mật khẩu thành công!!!')</script>";
            include 'View/hanghoa.php';


        } else{
            include 'View/dangnhap.php';
            echo "<script>alert ('thay đổi mật khẩu thất bại!!!')</script>";

        }
        break;
}