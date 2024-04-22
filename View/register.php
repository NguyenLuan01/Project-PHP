<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="Content/CSS/style1.css">
</head>
<body>
<?php

//$name="";
//$nameErr="";
//if(empty($_POST['name'])){
//    $nameErr='tên không được để trống';
//}else{
//    $name = $_POST['name'];
//    if(!preg_match('/([a-z]*(-|_)[a-z]*){3,8}$/',$name))
//    {
//        $nameErr='tên phải từ 3-8 kí tự , - ,_';
//    }
//}

?>
<div class="main" style="padding: 0px;">
    <style>
        input{
            text-transform: none;
        }
    </style>
    <!-- Sign up form -->
    <section class="signup" style="padding: 0px;">
        <div class="signup-content"  >
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form action="index.php?action=dangky&act=dk_action" method="POST" class="register-form"
<!--                <form action="#" method="POST" class="register-form"-->
<!--                      id="register-form">-->
                    <div class="form-group">
                        <span><?php if(!empty($nameErr)) echo   $nameErr; ?> </span>
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <div style="display: flex;justify-content: space-around">
                            <input  type="text" name="name" id="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>" placeholder="Your Name"/>
                          <?php if(empty($nameErr)&&!empty($_POST['name'])) echo '<span><i class="fa fa-check"></i></span>';?>
                        </div>
                    </div>
                    <div class="form-group">
                        <span><?php if(!empty($userErr)) echo   $userErr; ?> </span>
                        <label for="user"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <div style="display: flex;justify-content: space-around">
                        <input type="text" name="user" id="user" value="<?php if(!empty($_POST['user'])) echo $_POST['user']; ?>" placeholder="User Name"/>
                            <?php if(empty($userErr)&&!empty($_POST['user'])) echo '<span><i class="fa fa-check"></i></span>';?>

                        </div>
                    </div>
                    <div class="form-group">
                        <span><?php if(!empty($emailErr)) echo   $emailErr; ?> </span>
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <div style="display: flex;justify-content: space-around">
                            <input type="email" name="email" id="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>" placeholder="Your Email"/>
                            <?php if(empty($emailErr)&&!empty($_POST['email'])) echo '<span><i class="fa fa-check"></i></span>';?>
                        </div>

                    </div>
                    <div class="form-group">
                        <span><?php if(!empty($addressErr)) echo   $addressErr; ?> </span>
                        <label for="text"><i class="zmdi zmdi-address"></i></label>
                        <div style="display: flex;justify-content: space-around">
                            <input type="text" name="address" id="address"  value="<?php if(!empty($_POST['address'])) echo $_POST['address']; ?>" placeholder="Address"/>
                            <?php if(empty($addressErr)&&!empty($_POST['address'])) echo '<span><i class="fa fa-check"></i></span>';?>
                        </div>

                    </div>
                    <div class="form-group">
                        <span><?php if(!empty($sdtErr)) echo   $sdtErr; ?> </span>
                        <label for="text"><i class="zmdi zmdi-email"></i></label>
                        <div style="display: flex;justify-content: space-around">
                            <input type="text" name="sdt" id="sdt"  value="<?php if(!empty($_POST['sdt'])) echo $_POST['sdt']; ?>" placeholder="Number phone"/>
                            <?php if(empty($sdtErr)&&!empty($_POST['sdt'])) echo '<span><i class="fa fa-check"></i></span>';?>
                        </div>

                    </div>
                    <div class="form-group">
                        <span><?php if(!empty($passErr)) echo   $passErr; ?> </span>

                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <div style="display: flex;justify-content: space-around">
                            <input type="text" name="pass" id="pass"  value="<?php if(!empty($_POST['pass'])) echo $_POST['pass']; ?>" placeholder="Password"/>
                            <?php if(empty($passErr)&&!empty($_POST['pass'])) echo '<span><i class="fa fa-check"></i></span>';?>
                        </div>

                    </div>
                    <div class="form-group">
                        <span><?php if(!empty($re_passErr)) echo   $re_passErr; ?> </span>

                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <div style="display: flex;justify-content: space-around">
                            <input type="text" name="re_pass" id="re_pass"  value="<?php if(!empty($_POST['re_pass'])) echo $_POST['re_pass']; ?>" placeholder="Repeat your password"/>
                            <?php if(empty($re_passErr)&&!empty($_POST['re_pass'])) echo '<span><i class="fa fa-check"></i></span>';?>
                        </div>

                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="Content/images/signup-image.jpg" alt="sing up image"></figure>
                <a href="index.php?action=dangnhap" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </section>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>