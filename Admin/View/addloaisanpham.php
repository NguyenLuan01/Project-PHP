
      <div class="card mt-3">
        <div class="card-header info">
          QUẢN LÝ LOẠI HÀNG
        </div>
        <div class="card-body">
            <form action="index.php?action=loai&act=themloaisp_action" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" name="submit_file" class="btn btn-primary" value="Submit">

            </form>
            <?php
            if(isset($_GET['ma'])){
                $ma = $_GET['ma'];
                $loai= new loaisp();
                $result= $loai->getLoaispId($ma);
                $tenloai  =$result['tenloai'];
                $idmenu = $result['idmenu'];
            }
            if(isset($_GET['act'])){
                if($_GET['act']=='edit' || $_GET['act']=='edit_action'){
                    $ac =1;
                }
                if($_GET['act']=='themloaisp' ||$_GET['act']=='themloaisp_action'){
                    $ac=2;
                }
            }
            if($ac ==1){
                echo '<form action="index.php?action=loai&act=edit_action&ma='.$_GET['ma'].'"method="post" enctype="multipart/form-data">';
            }
            if($ac==2){
                echo '<form action="index.php?action=loai&act=themloaisp_action" method="post" enctype="multipart/form-data">';

            }
            if(isset($Err)){
                foreach ($Err as $err){
                    echo "<p style='color: red'>".$err."</p>";

                }
            }
            ?>

            <div class="form-group">
                <label for="">Mã danh mục</label>
                <input type="text" value="<?php if(isset($_GET['ma'])) echo $_GET['ma'];?>" readonly name="id" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text"  value="<?php if(isset($tenloai)) echo $tenloai;?>" name="namecata" class="form-control">

              </div>
              <div class="form-group">
                <label for="">Menu số:</label>
                <input type="text" name="menu" value="<?php if(isset($idmenu)) echo $idmenu;?>"  class="form-control">

              </div>

              <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                  <a href="" class="btn btn-danger">Danh sách</a>
              </div>
          </form>
        </div>
      </div>
