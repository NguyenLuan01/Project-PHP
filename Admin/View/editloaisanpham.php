<form name="frmloaihang" action="" method="post">
  <div class="card mt-3">
    <div class="card-header">
      QUẢN LÝ LOẠI HÀNG
    </div>
    <div class="card-body">
      <table class="table table-striped table">
        <thead>
          <tr class="bg-info">
            <th scope="col"></th>
            <th scope="col">Mã loại</th>
            <th scope="col">Tên loại</th>
            <th scope="col">idMenu</th>
            <th scope="col"></th>

          </tr>
        </thead>
        <tbody>
        <?php
        $loai= new loaisp();
        $result =$loai->getLoaisp();
        while ($set = $result->fetch()):
        ?>
        <tr>
              <th scope="row"><input type="checkbox" id="chonX" name="chonX" value="" ></th>
              <td><?php echo $set['maloai'];?></td>
              <td><?php echo $set['tenloai'];?></td>
              <td><?php echo $set['idmenu'];?></td>
            <?php
            if($_SESSION['admin'] != 'admin2'){
                ?>
                <td>
                    <a href="index.php?action=loai&act=del&ma=<?php echo $set['maloai'];?>" class="btn btn-warning">Xoá</a>
                    <a href="index.php?action=loai&act=edit&ma=<?php echo $set['maloai'];?>" class="btn btn-info">Sửa</a>
                </td>

                <?php
            }
            ?>
            </tr>
          <input type="hidden" name="xoa" value="" />
        <?php
        endwhile;
        ?>
        </tbody>
      </table>
    </div>
      <?php
      if($_SESSION['admin'] != 'admin2'){
          ?>
          <div class="card-footer">
              <a href="" class="btn btn-info">Chọn tất cả</a>
              <button class="btn btn-info" onclick="">Chọn tất cả(javascript)</button>
              <a href="" class="btn btn-info">Bỏ chọn</a>
              <a href="" class="btn btn-info">Xóa danh mục đã chọn</a>
              <button class="btn btn-info" onclick="">Xóa danh mục đã chọn test</button>
              <!-- <button type="submit" class="btn btn-info">Xoá danh mục đã chọn</button> -->
              <a href="index.php?action=loai&act=themloaisp" class="btn btn-info">Thêm mới</a>
          </div>
          <?php
      }
      ?>


  </div>
</form>
