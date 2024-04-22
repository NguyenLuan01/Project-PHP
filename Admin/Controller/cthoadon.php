<?php
$act ='cthoadon';
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
switch ($act){
    default:
        include 'View/cthoadon.php';
        break;
    case 'del':
        if(isset($_GET['id'])){
            $id= $_GET['id'];
        }
        $hh  =new hanghoa();
        $hh->delcthoadon($id);
        include 'View/cthoadon.php';

}