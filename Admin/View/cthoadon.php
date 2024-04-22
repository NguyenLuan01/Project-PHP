
<div  class="col-md-4 col-md-offset-4"><h3 ><b>DANH SÁCH CHI TIẾT HOÁ ĐƠN</b></h3></div>
<div class="row col-12">
    <?php
    if($_SESSION['admin'] != 'admin2'){
        ?>
        <a href="index.php?action=hanghoa&act=themsp"><h4>Thêm sản phẩm</h4></a>

        <?php
    }
    ?>
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-primary">
        <th>Mã Hoá Đơn</th>
        <th>Mã Hàng Hoá</th>
        <th>Số Lượng Mua</th>
        <th>Thành Tiền</th>
        <th>Tình Trạng</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $hh =new cthoadon();
    $result =$hh->getAllcthoadon();
    while ($set =$result->fetch()):
    ?>
    <tr>
        <td><?php echo $set['masohd'];?> </td>
        <td><?php echo $set['mahh'];?></td>
        <td><?php echo $set['soluongmua'];?></td>
        <td><?php echo $set['thanhtien'];?></td>
        <td><?php echo $set['tinhtrang'];?></td>
<!--        <td><a href="index.php?action=hanghoa&act=edit&id=--><?php //if(isset($set['masohd'])) echo $set['masohd'];?><!--">Cập nhật</a></td>-->
        <?php
        if($_SESSION['admin'] != 'admin2'){
            ?>
            <td><a href="index.php?action=cthoadon&act=del&id=<?php if(isset($set['masohd'])) echo $set['masohd'];?>">Xóa</a></td>
            <?php
        }
        ?>
    </tr>
    <?php
    endwhile;
    ?>
    </tbody>
  </table>
</div>