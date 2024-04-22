<?php
$act = 'hanghoa';
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
switch ($act){
    case 'themsp':
    case 'edit':
        include "./View/edithanghoa.php";
        break;
   case 'hanghoa':
        include "./View/hanghoa.php";
        break;
    case 'edit_action':
        $Err=array();
        $flag=true;
        if(isset($_GET['id'])) {
            $mahh = $_GET['id'];
            $tenhh = $_POST['tenhh'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $hinh = $_FILES['image']['name'];
            $maloai = $_POST['maloai'];
            $dacbiet = $_POST['dacbiet'];
            $soluotxem = $_POST['slx'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['mota'];
            $soluongton = $_POST['slt'];
            if($tenhh==""){
                    $Err[]="hãy điền tên";
                    $flag =false;
            } else if(preg_match('/([0-9|\.!@#$%^&*()]+)/',$tenhh))
            {
                $Err[]='tên không bao gồm số và kí tự đặc biệt ';
                $flag =false;
            }
            ///===============================end tenhh
            if($dongia==""){
            $Err[]="hãy điền đơn giá";
            $flag =false;
             } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$dongia))
            {
            $Err[]='đơn giá chỉ gồm chữ số ';
            $flag =false;
            }
        ///==================================end dongia
            if($giamgia==""){
            $Err[]="hãy điền giảm giá";
            $flag =false;
             } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
            $Err[]='giảm giá chỉ gồm chữ số ';
            $flag =false;
            }
        ///==================================end giamgia
            if($dacbiet==""){
            $Err[]="hãy điền đặc biệt";
            $flag =false;
             } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
            $Err[]='đặc biệt chỉ gồm chữ số ';
            $flag =false;
            }
        ///==================================end giamgia
            if($soluotxem==""){
            $Err[]="hãy điền số lượt xem";
            $flag =false;
             } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
            $Err[]='số lượt xem chỉ gồm chữ số ';
            $flag =false;
            }
        ///==================================end giamgia
            if($soluongton==""){
            $Err[]="hãy điền số lượng tồn";
            $flag =false;
             } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
            $Err[]='số lượng tồn chỉ gồm chữ số ';
            $flag =false;
            }
        ///==================================end slt
            if($mota==""){
            $Err[]="hãy điền mô tả";
            $flag =false;
             } else if(preg_match('/([\.!@#$%^&*()]+)/',$giamgia))
            {
            $Err[]='mô tả không tồn tại kí tự dặc biệt';
            $flag =false;
            }
        ///==================================end mota
            if($soluotxem==""){
            $Err[]="hãy điền số lượt xem";
            $flag =false;
             } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
            $Err[]='số lượt xem chỉ gồm chữ số ';
            $flag =false;
            }
        ///==================================end ngaylap

            }

        if(!$flag) {
            echo '<script> alert("cập nhật thất bại")</script>';
            include "./View/edithanghoa.php";

        }  else{
            //tien hanh cap nhat vao database
            $hh =new hanghoa();
            $hh->updatesp($mahh,$tenhh,$dongia,$giamgia,$hinh,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton);
            if(isset($hh)){
                uploadImg();
                echo '<script> alert("cập nhật thành công")</script>';
                include "./View/hanghoa.php";

            } else{
                echo '<script> alert("cập nhật thất bại")</script>';
                include "./View/edithanghoa.php";
            }
        }
        break;
    case 'themsp_action':
        $mahh=$_POST['mahh'];
        $tenhh = $_POST['tenhh'];
        $dongia = $_POST['dongia'];
        $giamgia = $_POST['giamgia'];
        $hinh = $_FILES['image']['name'];
        $maloai = $_POST['maloai'];
        $dacbiet = $_POST['dacbiet'];
        $soluotxem = $_POST['slx'];
        $ngaylap = $_POST['ngaylap'];
        $mota = $_POST['mota'];
        $soluongton = $_POST['slt'];
        $flag = true;
        $Err=array();
        if(isset($_POST['submit_bt'])){
            if($tenhh==""){
                $Err[]="hãy điền tên";
                $flag =false;
            } else if(preg_match('/([0-9|\.!@#$%^&*()]+)/',$tenhh))
            {
                $Err[]='tên không bao gồm số và kí tự đặc biệt ';
                $flag =false;
            }
            ///===============================end tenhh
            if($dongia==""){
                $Err[]="hãy điền đơn giá";
                $flag =false;
            } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$dongia))
            {
                $Err[]='đơn giá chỉ gồm chữ số ';
                $flag =false;
            }
            ///==================================end dongia
            if($giamgia==""){
                $Err[]="hãy điền giảm giá";
                $flag =false;
            } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
                $Err[]='giảm giá chỉ gồm chữ số ';
                $flag =false;
            }
            ///==================================end giamgia
            if($dacbiet==""){
                $Err[]="hãy điền đặc biệt";
                $flag =false;
            } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
                $Err[]='đặc biệt chỉ gồm chữ số ';
                $flag =false;
            }
            ///==================================end giamgia
            if($soluotxem==""){
                $Err[]="hãy điền số lượt xem";
                $flag =false;
            } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
                $Err[]='số lượt xem chỉ gồm chữ số ';
                $flag =false;
            }
            ///==================================end giamgia
            if($soluongton==""){
                $Err[]="hãy điền số lượng tồn";
                $flag =false;
            } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
                $Err[]='số lượng tồn chỉ gồm chữ số ';
                $flag =false;
            }
            ///==================================end slt
            if($mota==""){
                $Err[]="hãy điền mô tả";
                $flag =false;
            } else if(preg_match('/([\.!@#$%^&*()]+)/',$giamgia))
            {
                $Err[]='mô tả không tồn tại kí tự dặc biệt';
                $flag =false;
            }
            ///==================================end mota
            if($soluotxem==""){
                $Err[]="hãy điền số lượt xem";
                $flag =false;
            } else if(preg_match('/([a-z|A-Z|\.!@#$%^&*()]+)/',$giamgia))
            {
                $Err[]='số lượt xem chỉ gồm chữ số ';
                $flag =false;
            }
            ///==================================end ngaylap

        }
        if(!$flag){
            echo '<script> alert("thêm sản phẩm thất bại")</script>';
            include "./View/edithanghoa.php";

        }else {

            $hh = new hanghoa();
            $hh->insertsp($tenhh, $dongia, $giamgia, $hinh, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton);
            if (isset($hh)) {
                uploadImg();
                echo '<script> alert("thêm sản phẩm thành công")</script>';
                include "./View/hanghoa.php";

            } else {
                echo '<script> alert("thêm sản phẩm thất bại")</script>';
                include "./View/edithanghoa.php";

            }
        }
    break;
    case 'del':
        if(isset($_GET['id'])){
            $id= $_GET['id'];
            $hh= new  hanghoa();
            $hh->del($id);
            if(isset($hh)){
                echo '<script> alert("xoá sản phẩm thành công")</script>';
                include "./View/hanghoa.php";
            }
        }
}
?>