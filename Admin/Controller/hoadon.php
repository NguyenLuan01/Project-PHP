<?php
$act ='hoadon';
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
switch ($act){
    default:
        include 'View/hoadon.php';
        break;
    case 'del':
        if(isset($_GET['id'])){
            $id= $_GET['id'];
        }
        $hh  =new hanghoa();
        $hh->delhoadon($id);
        include 'View/hoadon.php';

}
