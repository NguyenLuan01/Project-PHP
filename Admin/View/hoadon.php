
<div  class="col-md-4 col-md-offset-4"><h3 ><b>DANH SÁCH HOÁ ĐƠN</b></h3></div>
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
        <th>Mã Khách Hàng</th>
        <th>Ngày Đặt</th>
        <th>Tổng Tiền</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $hh =new hoadon();
    $result =$hh->getAllhoadon();
    while ($set =$result->fetch()):
    ?>
    <tr>
        <td><?php echo $set['masohd'];?> </td>
        <td><?php echo $set['makh'];?></td>
        <td><?php echo $set['ngaydat'];?></td>
        <td><?php echo $set['tongtien'];?></td>
        <?php
        if($_SESSION['admin'] != 'admin2'){
            ?>
            <td><a href="index.php?action=hoadon&act=del&id=<?php if(isset($set['masohd'])) echo $set['masohd'];?>">Xóa</a></td>

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