<?php
$act = 'dangky';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case  'dangky':
        include 'View/register.php';
        break;
    case  'dk_action':
        $success = true;
//        $nameErr="";
//        $name="";
        $name=$email=$sdt=$pass=$user=$address=$re_pass="";
        $nameErr=$emailErr=$sdtErr=$passErr=$userErr=$addressErr=$re_passErr="";

        if(empty($_POST['name'])){
            $nameErr='tên không được để trống';
            $success=false;
        }else{
            $name = $_POST['name'];
            if(preg_match('/([0-9|\.!@#$%^&*()]+)/',$name))
            {
                $nameErr='tên không bao gồm số và kí tự đặc biệt ';
                $success =false;
            }
        }
        /////////////////////////////////////////////user/////////////////////////////////////////////
        if(empty($_POST['user'])){
            $userErr='user không được để trống';
            $success = false;
                }else{
                $user = $_POST['user'];
    //            if(!preg_match('/^[a-z|A-Z](\s*.*[^0-9]\s*){3,18}$/
                if (!preg_match('/^[a-z|A-Z].*[^\.!@#$%^&*()]{3,13}$/',$user))
//                if(preg_match('/([0-9|\.!@#$%^&*()]+)/',$user))
                {
                    $userErr="tên tài khoản từ 4-13 kí tự,gồm chữ và số";
                    $success = false;
                } 
            }
        /////////////////////////////////////////////email        /////////////////////////////////////////////
        if(empty($_POST['email'])){
            $emailErr='email không được để trống';
            $success = false;
        }else{
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $emailErr="hãy nhập emai đúng";
                $success = false;
            }
            $tam =true;
            $db=new connect();
            $select = 'SELECT email FROM `khachhang1`';
            $result = $db->getlist($select);
            foreach ($result as $v){
                if($v['email']==$email){
                    $success = false;
                    $tam =false;
                }
            }
            if(!$tam){
                $emailErr="email đã tồn tại";

            }


        }
        /////////////////////////////////////////////dịa chỉ        /////////////////////////////////////////////
        if(empty($_POST['address'])){
            $addressErr='địa chỉ không được để trống';
            $success = false;
        }else{
            $address = $_POST['address'];
            if(!preg_match('/.*(quận|Quận|huyện|Huyện).*(tỉnh|Tỉnh|tp|Tp).*/',$address) || preg_match('/.*[\.!@#$%^&*()].*/',$address))
            {
                $addressErr="hãy nhập đúng địa chỉ";
                $success = false;
            }
        }
        /////////////////////////////////////////////số điện thoại       /////////////////////////////////////////////
        if(empty($_POST['sdt'])){
            $sdtErr='số điện thoại không được để trống';
            $success = false;
        }else{
            $sdt = $_POST['sdt'];
                if(!preg_match("/^[0|+84]{1,3}\d{9,10}$/",$sdt))
                {
                $sdtErr="hãy nhập chính xác số điện thoại ";
                $success = false;
            }
        }
        /////////////////////////////////////////////mật khẩu     /////////////////////////////////////////////
        if(empty($_POST['pass'])){
            $passErr='mật khẩu là bắt buộc';
            $success = false;
        }else{
            $pass = $_POST['pass'];
//                if(!preg_match("/^[0|+84]{1,3}\d{9,10}$/",$sdt)
                if(!preg_match("/.*[A-Z].*[0-9]{1,}.*$/",$pass))
                {
                $passErr="mật khẩu phải chứa chữ in hoa và số";
                $success = false;
            }
        }
        /////////////////////////////////////////////xác thưc mật khẩu      /////////////////////////////////////////////
        if(empty($_POST['re_pass'])){
            $re_passErr='yêu cầu xác nhận mật khẩu';
            $success = false;
        }else{
            $re_pass = $_POST['re_pass'];
                if($re_pass!=$pass)
                {
                $re_passErr="mật khẩu xác nhận không khớp";
                $success = false;
            }
        }

//
        if (!$success){
            include "View/register.php";

        }else {
            $ten = $_POST['name'];
            $user = $_POST['user'];
            $mail = $_POST['email'];
            $pass = $_POST['pass'];
            $sdt = $_POST['sdt'];
            $add = $_POST['address'];
            $re_pass = $_POST['re_pass'];
            //ma hoá string
            $crypt = md5($pass);
            $ur = new user();
            $find = $ur->find($user);
//            echo var_dump($find);
            if ($find != false) {
                echo "<script>alert ('user đã tồn tại !!!')</script>";
                include "View/register.php";
            } else {
                $check = $ur->addUser($ten, $user, $crypt, $mail, $add, $sdt);
                if ($check != 'false') {
                    echo "<script>alert ('đăng ký thành công!!!')</script>";
                    echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=dangnhap"/>';
                } else {
                    echo "<script>alert ('đăng nhập thất bại!!!')</script>";
                    include "View/register.php";

                }
            }

        }
        break;
}
