<?php

class giohang
{
    function add_item($key, $quantity)
    {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
             foreach ($cart as $k => $value){
                if( $cart[$k]['mahh'] == $key){
                    $_SESSION['cart'][$k]['soluong']+=$quantity;
                    return 0;
                }
            }
        }
        $product = new hanghoa();
        $pro = $product->gethanghoaID($key); //lay ra thong tin cua mot san pham
        $scost = $pro['dongia'];
        $giamgia = $pro['giamgia'];

        $total = ($giamgia > 0)?$giamgia*$quantity:$scost * $quantity;
        $hinh = $pro['hinh'];
        $ten = $pro['tenhh'];
        //tao doi tuong
        $item = array(
            'mahh' => $key,
            'hinh' => $hinh,
            'ten' => $ten,
            'soluong' => $quantity,
            'total' => $total,
            'dongia' => $scost,
            'giamgia'=>$giamgia
        );
        $_SESSION['cart'][] = $item;
        return 1;
    }

    function del_item($key)
    {
        unset($_SESSION['cart'][$key]);
    }
    function fix_item($key, $quantity)
    {
        if ($quantity <= 0) {
            $this->del_item($key);
        } else {
            $_SESSION['cart'][$key]['soluong'] = $quantity;
            $total_new = ($_SESSION['cart'][$key]['giamgia']==0)? $quantity * $_SESSION['cart'][$key]['dongia']:$quantity * $_SESSION['cart'][$key]['giamgia'];
            $_SESSION['cart'][$key]['total'] = $total_new;
        }
    }

}
