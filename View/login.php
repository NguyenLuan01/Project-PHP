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

<div class="main" style="padding: 0px">

    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <?php

                    if($_GET['action']=='dangnhap'){
                        echo '<figure><img src="Content/images/signin-image.jpg" alt="sing up image"></figure>';
                    } elseif ($_GET['action']=='changePass'){
                        echo '<figure><img src="Content/images/changepass.jpg" alt="sing up image"></figure>';
                    }
                    ?>
                    <a href="index.php?action=dangky" class="signup-image-link">Create an account</a>


                </div>

                <div class="signin-form">


                    <?php
                    if(isset($_GET['act'])&&$_GET['act']!='login_action'):
                    if(isset($_GET['action']) && $_GET['act']== 'forget_action'):
                    ?>

                    <h2 class="form-title">Enter Code</h2>

                    <form method="POST" action="index.php?action=dangnhap&act=resetpw"  class="register-form"
                          id="login-form">
                        <div class="form-group">
                            <input type="hidden" name="email" value="">
                            <div class="form-group">

                                <label for="your_user"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="code" id="code" placeholder="Your Code"/>
                            </div>
                            <div class="form-group">

                                <label for="your_user"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name='password' id="password" placeholder="New password"/>
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="submit_password" id="submit_password" class="form-submit" value="Send Code"/>
                        </div>
                    </form>

                    <?php

                    elseif(isset($_GET['action']) && $_GET['act']== 'forget'):
                        ?>

                        <h2 class="form-title">Forget Password</h2>

                        <form method="POST" action="index.php?action=dangnhap&act=forget_action"  class="register-form"
                              id="login-form">
                            <span><?php if(!empty($Err)) echo   $Err; ?></span>
                            <div class="form-group">

                                <label for="your_user"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Mail"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit_email" id="submit_email" class="form-submit" value="Send Code"/>
                            </div>
                        </form>

                    <?php
                        endif;
                    else:
                        if($_GET['action']=='dangnhap'):
                        ?>

                        <h2 class="form-title">Sign up</h2>

                    <form method="POST" action="index.php?action=dangnhap&act=login_action"  class="register-form"
                          id="login-form">
                        <span><?php if(!empty($Err)) echo   $Err; ?></span>
                        <div class="form-group">

                            <span><?php if(!empty($userErr)) echo   $userErr; ?></span>
                            <label for="your_user"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_user" id="your_user" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <span><?php if(!empty($passErr)) echo   $passErr; ?></span>
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>
                            <a href="index.php?action=dangnhap&act=forget" style="text-decoration: none">forget password ?</a>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                    <?php

                    endif;
                    endif;
                    if($_GET['action']=='changePass'):

                    ?>
                    <h3 class="form-title">Change Password</h3>
                    <form method="POST" action="index.php?action=changePass"  class="register-form"
                          id="login-form">
                        <span><?php if(!empty($Err)) echo   $Err; ?></span>
                        <div class="form-group">

                            <label for="your_user"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" value="<?php echo $_SESSION['ten']; ?>" name="your_user" id="your_user" disabled placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <span><?php if(!empty($old_passErr)) echo  $old_passErr; ?></span>
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="old_pass" id="old_pass" placeholder="Old Password"/>
                        </div>
                        <div class="form-group">
                            <span><?php if(!empty($new_passErr)) echo  $new_passErr ; ?></span>
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="new_pass" id="new_pass" placeholder="New Password"/>
                        </div>
                        <div class="form-group">
                            <span><?php if(!empty($re_new_passErr)) echo $re_new_passErr; ?></span>
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="re_new_pass" id="re_new_pass" placeholder=" Confirm Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="
                    <?php if($_GET['action']=='dangnhap'){echo 'Log in';} elseif ($_GET['action']=='changePass'){echo 'Change';} ?>"/>
                        </div>
                    </form>
                    <?php
                    endif;
                    ?>


                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="./Content/js/main.js"></script>
</body>
</html>