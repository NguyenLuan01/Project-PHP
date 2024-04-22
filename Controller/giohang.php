<?php
//kiểm tra giỏ hàng , nếu chưa có phải tạo giỏ hàng
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
//khi nhan ok thi truyne du lieu qua controller

if (isset($_POST['mahh'])) {
    $mahh = $_POST['mahh'];
    $sl = $_POST['soluong'];
    //đưa thông tin vào giỏ hàng
    $giohang = new giohang();
    $giohang->add_item($mahh, $sl);

}
if (isset($_GET['act'])) {
    if ($_GET['act'] == 'del') {
        $giohang = new giohang();
            $giohang->del_item($_GET['id']);

        }
    if($_GET['act'] == 'delAll'){
        unset($_SESSION['cart']);
    }
    if ($_GET['act']  == "fix") {
        if (isset($_POST['newqty'])) {
            $new_list = $_POST['newqty'];// $new_list=[0=>3,1=>4]
            //so luong trong gio hang khac sl trong newlist thi update
            foreach ($new_list as $i => $v) {
                if ($_SESSION['cart'][$i]['soluong'] != $v) {
                    //viet model xu li
                    $gh = new giohang();
                    $gh->fix_item($i, $v);
                }

            }

        }
    }
}



include 'View/cart.php';