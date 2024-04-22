<?php
$act= "loai";
if(isset($_GET['act'])){
    $act=$_GET['act'];

}
switch ($act){
    default:
        include "View/editloaisanpham.php";
        break;
    case "edit":
    case  'themloaisp':
        include "View/addloaisanpham.php";
        break;
    case 'del':
        if(isset($_GET['ma'])){
            $ma =$_GET['ma'];
            $loai =new loaisp();
           $result = $loai->delLoaisp($ma);
            if($result){
                echo '<script> alert("đã xoá")</script>';

            } else{
                echo '<script> alert("thất bại")</script>';

            }
        }
        include "View/editloaisanpham.php";
        break;

    case 'edit_action':
        $flag=true;
        $Err=array();
        if($_GET['ma']){
            $ma = $_GET['ma'];
            $tenloai = $_POST['namecata'];
            $idmenu = $_POST['menu'];

            if($idmenu==""){
                $Err[]="hãy điền số menu";
                $flag =false;
            } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$idmenu))
            {
                $Err[]='idmenu chỉ gồm chữ số ';
                $flag =false;
            }
            //=====================================
            if($tenloai==""){
                $Err[]="hãy điền tên danh mục";
                $flag =false;
            } else if(preg_match('/([0-9\.!@#$%^&*()]+)/',$idmenu))
            {
                $Err[]='tên danh mục chỉ gồm chữ  ';
                $flag =false;
            }
            //=====================================
        if(!$flag){
            echo '<script> alert("thất bại")</script>';
            include "View/addloaisanpham.php";

        } else {


            $loai = new loaisp();
            $result = $loai->updateloaisp($ma, $tenloai, $idmenu);
            if ($result) {
                echo '<script> alert("đã sửa")</script>';
                include "View/editloaisanpham.php";


            } else {
                echo '<script> alert("thất bại")</script>';
                include "View/addloaisanpham.php";

            }
        }
        }
        break;
    case 'themloaisp_action':
        if(isset($_POST['submit_file'])) {
            //b1 lay file ve
            $file = $_FILES['file']['tmp_name'];
            // xoa ki tu db
            file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
            //mo file
            $file_open = fopen($file,'r'); //mo de ddoc
            //b3 doc noi dung cua file
            while (($csv = fgetcsv($file_open,1000,";"))!=false){

                $maloai  =$csv[0];
                $tenloai=$csv[1];
                $idmenu = $csv[2];
                $loai = new loaisp();
                $loai->insertWcsv($maloai,$tenloai,$idmenu);
            }
            echo '<script> alert("đã thêm")</script>';
            include "View/editloaisanpham.php";
        }
        $flag=true;
        $Err=array();
        if(isset($_POST['submit'])) {
            $tenloai = $_POST['namecata'];
            $idmenu = $_POST['menu'];
            $maloai = $_POST['id'];

            if ($idmenu == "") {
                $Err[] = "hãy điền số menu";
                $flag = false;
            } else if (preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/', $idmenu)) {
                $Err[] = 'idmenu chỉ gồm chữ số ';
                $flag = false;
            }
            //=====================================
            if ($tenloai == "") {
                $Err[] = "hãy điền tên danh mục";
                $flag = false;
            } else if (preg_match('/([0-9\.!@#$%^&*()]+)/', $idmenu)) {
                $Err[] = 'tên danh mục chỉ gồm chữ  ';
                $flag = false;
            }
        }
            //=====================================
    if(!$flag){
        echo '<script> alert("thất bại")</script>';
        include "View/addloaisanpham.php";

    } else {


        $loai = new loaisp();
        $result = $loai->addloaisp($maloai, $tenloai, $idmenu);
        if ($result) {
            echo '<script> alert("đã thêm")</script>';
            include "View/editloaisanpham.php";
        } else {
            echo '<script> alert("thất bại")</script>';
            include "View/addloaisanpham.php";
        }
    }
    break;


}