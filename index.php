<?php
include "Model/PHPMailer.php";
include "Model/SMTP.php";
//include "Model/connect.php";
//include "Model/hanghoa.php";
//include "Model/giohang.php";
//include "Model/user.php";
//include "Model/hoadon.php";
//set duong dan tu việc lấy đường dẫn đesn model
set_include_path(get_include_path().PATH_SEPARATOR.'Model/');
//tự động load những file có đuôi php
spl_autoload_extensions('.php');
//tự động load
spl_autoload_register();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--    bootrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="./Content/CSS/style.css">
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>


<!-- header -->
<?php
include 'View/headder.php';
?>
<!-- hiên thi noi dung -->
<div class="container">
    <div class="row">

        <!-- hien thi noi dung đây -->
        <?php
        $ctrl = 'home';
        if (isset($_GET['action'])) {
            $ctrl = $_GET['action'];
        }
        include 'Controller/' . $ctrl . '.php';
        //              include  'Controller/sanpham.php';
        ?>
    </div>
    <!-- hiên thị footer -->
    <?php
    include 'View/footer.php';
    ?>
    <!-- custom js file link  -->
    <script src="./Content/js/script.js"></script>

</body>
</html>
