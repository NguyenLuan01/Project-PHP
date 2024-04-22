<?php
function uploadImg(){
    //tao duong dan lay hinh ve
    $target_dir= "../DuAnOni/Content/image/";
//    $target_dir2="./Content/imagetourdien/";
    //b1 : can lay ten hinh ve de vao duong dan
    $target_file = $target_dir.basename($_FILES['image']['name']);
//    $target_file2 = $target_dir2.basename($_FILES['image']['name']);
    //b2:lay phan mo rong ra de kiem tra co phai hinh hay k
    $imgFileTypes=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //b3:kime tra hinh da up len serve chua
    $uploadhinh =1;
    if(isset($_POST['submit'])){
        $check = getimagesize($_FILES['image']['tmp_name']);
        if($check){
           $uploadhinh =1;
        } else{
            $uploadhinh=0;
            echo '<script> alert("hinh khong ton tai")</script>';
        }
    }
    //kiem tra co trong thu muc chua
    if(file_exists($target_file)){
        $uploadhinh=0;
        echo '<script> alert("hinh da ton tai")</script>';
    }
    //hinh k vuo qua 500kb
    if($_FILES['image']['size']>500000){
        $uploadhinh = 0;
        echo '<script> alert("dung lượng hình quá lớn")</script>';
    }
    //kiem ta file co phai dinh dang hinh hay k
    if($imgFileTypes != 'jpg' && $imgFileTypes != 'png'
    && $imgFileTypes != 'jpeg' && $imgFileTypes != 'gif'){
        $uploadhinh = 0;
        echo '<script> alert("file ko đúng định dạng hình")</script>';
    }
    if($uploadhinh ==1){
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){
            echo '<script> alert("upload hình thành công")</script>';

        } else{
            echo '<script> alert("upload thất bại")</script>';

        }
    }
}