<?php
$hh  = new hanghoa();
$result = $hh -> gethanghoaAll();
$count = $result->rowCount();

$limit = 10;

$p = new page();

$page = $p->findPage($count,$limit);
$start  = $p->findStart($limit);

$current_page = isset($_GET['page'])?$_GET['page']:1;

?>
<div  class="col-md-4 col-md-offset-4"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3></div>
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
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Hình</th>
        <th>Mã loại</th>
        <th>Đặc biệt</th>
        <th>Số lượt xem</th>
        <th>Ngày lập</th>
        <th>Mô tả</th>
        <th>Số lượng tồn</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $hh =new hanghoa();
    $result =$hh->getListHangHoaAllPage($start,$limit);
    while ($set =$result->fetch()):
    ?>
    <tr>
        <td><?php echo $set['mahh'];?> </td>
        <td><?php echo $set['tenhh'];?></td>
        <td><?php echo $set['dongia'];?></td>
        <td><?php echo $set['giamgia'];?></td>
        <td><img width="50px" height="50px" src="../DuAnOni/Content/image/<?php echo $set['hinh'];?>"/></td>
        <td><?php echo $set['maloai'];?></td>
        <td><?php echo $set['dacbiet'];?></td>
        <td><?php echo $set['soluotxem'];?></td>
        <td><?php echo $set['ngaylap'];?></td>
        <td><?php echo $set['mota'];?></td>
        <td><?php echo $set['soluongton'];?></td>
        <?php
        if($_SESSION['admin'] != 'admin2'){
        ?>
        <td><a href="index.php?action=hanghoa&act=edit&id=<?php echo $set['mahh'];?>">Cập nhật</a></td>
        <td><a href="index.php?action=hanghoa&act=del&id=<?php echo $set['mahh'];?>">Xóa</a></td>
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
<nav aria-label="Page navigation example" style="display: flex;justify-content: center" >
    <ul class="pagination fa-2x">
        <?php
        if($current_page>1 && $page>1)
        {
            echo '<li class="page-item"><a class="page-link" href="index.php?action=hanghoa&page='.($current_page-1).'">Prev</a></li>';
        }
        for ($i=1;$i<=$page;$i++){
            ?>
            <li  class="page-item"><a class="page-link" href="index.php?action=hanghoa&page=<?php echo $i;  ?>"><?php echo $i; ?></a></li>
            <?php
        }
        if ($current_page < $page && $page>1){
            echo '<li class="page-item"><a class="page-link" href="index.php?action=hanghoa&page='.($current_page+1).'">Next</a></li>';

        }
        ?>
    </ul>
</nav>