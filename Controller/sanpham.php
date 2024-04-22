<?php
$model = 'sanpham';
if(isset($_POST['submitsx'])){

    $_SESSION['sx'] = $_POST['sx'];
}
if(isset($_GET['act']))
{
    $model=$_GET['act'];

}
    switch ($model)
{
    case 'detail':
        include "View/sanphamchitiet.php";
        break;
    case 'cmt':
    if(isset($_POST['mahh'])){
        $mahh= $_POST['mahh'];
        $noidung = $_POST['comment'];
        $sosao = $_POST['sosao'];
        $makh = $_SESSION['ma'];
        $cmt = new comment();
        $cmt->insertComment($mahh,$makh,$noidung,$sosao);
    }
    include "View/sanphamchitiet.php";
        break;
    default :
        include "View/sanpham.php";





    }





