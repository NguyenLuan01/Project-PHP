<?php
if(isset($_GET['act'])){
    $_SESSION['cart']=[];
} else{
if( isset($_SESSION['ma'])) {
    //yeu cau model insert vao database
    $hd = new hoadon();
    $sohd =$hd->insertOrder($_SESSION['ma']);
    $_SESSION['sohd']=$sohd;
    //tien hanh insert nuhng thong tin tu gio han gvo bang chi tiet hoa don
    $tongtien=0;
    foreach ($_SESSION['cart'] as $k=>$i){
        $hd->insertDetailHoadon($sohd,$i['mahh'],$i['soluong'],$i['total']);
        $tongtien+=$i['total'];
    }
    //yeu cau models update tong tien vao hoa don
    $hd->updateOrderTotal($sohd,$tongtien);
    include "./View/thanhtoan.php";

}
 else{
    echo "<script>alert ('ban chua dang nhap')</script>";
    include "./View/register.php";
}}