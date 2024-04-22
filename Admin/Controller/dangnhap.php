<?php
    $act="dangnhap";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            include "./View/dangnhap.php";
            break;
        
        case 'dangnhap_action':
            # nhận về user và pass, khi mà đăng nhập thành công
            // lưu vào $_SESSION['admin']
            if(isset($_POST['txtusername'])&& isset($_POST['txtpassword']))
            {
                $user=$_POST['txtusername'];//admin
                $pass=$_POST['txtpassword'];//123456\
                $pass =md5($pass);
                // lấy thông tin người dùng nhập vào kiểm tra có tồn tại trong database
                $dn=new dangnhap();
                $check=$dn->getAdmin($user,$pass);
                if($check!=false)
                {
                    $_SESSION['admin']=$check[0];//admin
                    $_SESSION['mk']=$check[1];
                    echo '<script> alert("Đăng nhập thành công");</script>';
                    // nếu đăng nhập thành công thì hiển thị trang hàng hóa
                    echo '<meta http-equiv=refresh content="0;url=../admin/index.php?action=hanghoa"/>';
                }
                else
                {
                    echo '<script> alert("Đăng nhập ko thành công");</script>';
                    include "./View/dangnhap.php";
                }
            }
            break;
    }
?>