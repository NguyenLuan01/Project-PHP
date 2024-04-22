<?php
$act= "thongke";
if(isset($_GET['act'])){
    $act=$_GET['act'];

}
switch ($act) {
    default:
        include "View/thongke.php";
        break;
    case 'loai':
        include "View/thongkeloai.php";
        break;
   case 'khachhang':
        include "View/thongkekh.php";
        break;
    case 'binhluan':
        include "View/thongkecmt.php";
        break;
    case 'baocao':
        include "View/baocao.php";
        break;
    case 'tonkho':
        include "View/slton.php";
        break;
}