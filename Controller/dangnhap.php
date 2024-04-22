<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$act = 'dangnhap';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include "View/login.php";
        break;
    case  'login_action':
        $success =true;
        $userErr=$passErr=$Err="";
        //
        if(empty($_POST['your_user'])){
            $userErr='user không được để trống';
            $success = false;
        }
    //
        //
        if(empty($_POST['your_pass'])){
            $passErr='Password không được để trống';
            $success = false;
        }
    //
            $user = $_POST['your_user'];
            $pass = md5($_POST['your_pass']);
            //controller yeu cau model kiem tra
            $us = new user();
            $kq = $us->loginuser($user, $pass); //$kq = ['tenkh','pass','...']
            if($kq==false){
                $success =false;
                $Err='sai tên hoặc mật khẩu';
            }
            if ($success == true) {
                //dua thong tin len session nham muc dich xac nhan thao tac cua user tai cac page khac nhau
                $_SESSION['ma'] = $kq['makh'];
                $_SESSION['ten'] = $kq['tenkh'];
                $_SESSION['user'] = $kq['username'];
                $_SESSION['pass'] = $kq['matkhau'];
                echo "<script>alert ('đăng nhập thành công!!!')</script>";
                echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=home"/>';
            } else {
                echo "<script>alert ('đăng nhập thất bại!!!')</script>";
                include "View/login.php";

            }


        break;
    case 'logout':
        unset($_SESSION['ma']);
        unset($_SESSION['ten']);
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=home"/>';
//        include "View/home.php";


        break;

    case 'forget_action':
        if(isset($_POST['submit_email']))
        {
            $email=$_POST['email'];
            $_SESSION['email']=array();
            // kiểm tra email có tồn tại không
            $usr=new user();
            $checkemail=$usr->getEmail($email);
            if($checkemail!=false)
            {
                // tạo ra code gửi qua mail đó
                $code=random_int(100000,999999);
                // tạo ra và lưu vào Session
                //tạo ra đối tượng
                $item=array(
                    'code'=>$code,//480
                    'email'=>$email,//ly@gmail.com
                );
                $_SESSION['email'][]=$item;
                // tiến hành gửi mail
                $mail = new PHPMailer(true);
                $mail->IsSMTP();								//Sets Mailer to send message using SMTP
                $mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
                $mail->Port = 587;								//Sets the default SMTP server port
                $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
                $mail->Username = 'email.smpts@gmail.com';					//Sets SMTP username
                $mail->Password = 'trfiggrmhjtiquub';//Phplytest20@php					//Sets SMTP password
                $mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
                $mail->From = 'email.smpts@gmail.com';					//Sets the From email address for the message
                $mail->FromName = 'Luan';				//Sets the From name of the message
                $mail->AddAddress($email, 'Reset password');		//Adds a "To" address
//                    $mail->AddBCC($email, 'test');	//Adds a "Cc" address
                $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
                $mail->IsHTML(true);							//Sets message type to HTML
                $mail->Subject = "Forget Password";				//Sets the Subject of the message
                $mail->Body = 'Vui lòng nhập mã code sau '.$code;				//An HTML or plain text message body
                if($mail->Send())								//Send an Email. Return true on success or false on error
                {
                    echo '<script> alert("Gửi mail thành công");</script>';
                    include "View/login.php";

                }
                else
                {
                    echo '<script> alert("Lỗi gửi mail");</script>';
//                    include "./View/forgetpassword.php";

                }

            }
            else
            {
                echo '<script> alert("Email không tồn tại");</script>';
                include "./View/forgetpassword.php";
            }
        }
        break;
    case 'resetpw':
        if(isset($_POST['submit_password']))
        {
            $codeold=$_POST['code'];
            foreach($_SESSION['email'] as $key=>$item)
            {
                if($item['code']==$codeold)
                {
                    // cập nhật
                    $codenew=md5($_POST['password']);
                    $emailold=$item['email'];
                    $usr=new user();
                    $usr->updateEmail($emailold, $codenew);
                    echo '<script> alert("Thay đổi mật khẩu thành công");</script>';

                }
                else
                {
                    echo '<script> alert("Mã code sai");</script>';
                    include "View/login.php";

                }
            }
        }
        include "./View/home.php";
        break;
    default:
        include "View/login.php";

}
