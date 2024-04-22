<?php
$tam = true;
    $new_passErr=$re_new_passErr=$old_passErr="";
    if(empty($_POST['old_pass'])){
        $old_passErr ="Vì bảo mật yêu cầu nhập mật khẩu hiện tại";
        $tam =false;
    } else{
        if(md5($_POST['old_pass']) != $_SESSION['pass']){
            $tam =false;
            $old_passErr = "mật khẩu sai, yêu cầu điền mật khẩu";
        }

    }
    //===========================================================
    if(empty($_POST['new_pass'])){
        $new_passErr = "Yêu cầu điền mật khẩu mới";
        $tam = false;
    } else{
        if(!preg_match("/.*[A-Z].*[0-9]{1,}.*$/",$_POST['new_pass']))
        {
            $new_passErr="mật khẩu phải chứa chữ in hoa và số";
            $tam = false;

        }
    //===========================================================
    if(empty($_POST['re_new_pass'])){
        $re_new_passErr="Yêu cầu xác nhận lại mật khẩu";
        $tam =false;
    }else{
        if($_POST['new_pass'] != $_POST['re_new_pass']){
            $tam = false;
            $re_new_passErr = "xác nhận mật khẩu không  khớp";
        }
    }
    if ($tam){
        $new_pass = $_POST['new_pass'];
        $re_new_pass = $_POST['re_new_pass'];
        $old_pass = md5($_POST['old_pass']);

        $user = new user();
         $user->updatePass($_SESSION['ma'],$new_pass);
        echo "<script>alert ('thay đổi mật khẩu thành công!!!')</script>";

    }
}
include 'View/login.php';

