<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

    $act="forgetps";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {

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
                        include "View/resetpw.php";

                    }
                    else
                    {
                        echo '<script> alert("Lỗi gửi mail");</script>';
                        include "./View/forgetpassword.php";

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
                $codeold=$_POST['password'];
                foreach($_SESSION['email'] as $key=>$item)
                {
                    if($item['code']==$codeold)
                    {
                        $head = 'SC113#';
                        $foot = 'AC3';

                        // cập nhật
                        $codenew=md5($head . $_POST['password'] . $foot);
                        $emailold=$item['email'];
                        $usr=new user();
                        $usr->updateEmail($emailold, $codenew);

                    }
                    else
                    {
                        echo '<script> alert("Mã code sai");</script>';
                    }
                }
            }
            include "./View/home.php";
            break;

    }
//?>