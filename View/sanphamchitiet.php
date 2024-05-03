<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<section>

    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="my-5 fw-bold">CHI TIẾT SẢN PHẨM</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="card"> -->
            <div class="container-fliud">
                <div class="wrapper row">

                    <div class="preview col-md-6">
                        <form action="index.php?action=giohang" method="post">

                            <div class="tab-content">
                                <?php

                                $nhom = "";
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    //goi model de lay thon tin
                                    $hh = new  hanghoa();
                                    $result = $hh->gethanghoaID($id);
                                    $tenhh = $result['tenhh'];
                                    $dongia = ($result['giamgia']==0)? $result['dongia']:$result['giamgia'];
                                    $mota = $result['mota'];
                                    $hinh = $result['hinh'];
                                }
                                ?>

                                <div class="tab-pane active" id="" style="width: 400px"><img
                                            src="Content/image/<?php echo $hinh; ?> " alt="" width="100%">
                                </div>

                            </div>

                    </div>
                    <div class="details col-md-6">
                        <input type="hidden" name="mahh" value="<?php echo $id; ?>"/>
                        <h2 class="product-title fw-bold fa-2x"> <?php echo $tenhh; ?> <span>(
                                <?php
                                $cmt = new comment();
                               $result= $cmt->CalCmt($_GET['id']);
                               if($result){
                                   echo round($result['tongsao']/$result['slbl'],1);
                               }
                                ?>/5<i id="star2" class="fa fa-star"></i>
                                )</span> </h2>
                            <style>
                                #star{
                                    text-decoration: none;
                                    color: grey;
                                }
                                #star2{
                                    color: #ff9f1a;
                                }
                            </style>
                            <div class="stars">
                                <?php
                                $star = 0;
                                if(isset($_GET['star'])){
                                    $star = $_GET['star'];
                                }
//                              if(isset($_GET['star'])){
                                  for($i=1;$i<=5;$i++){
                                      if($i <= $star){
                                          echo '<a  id="star2"  href="index.php?action=sanpham&act=detail&id='.$_GET['id'].'&star='.$i.'" class="fa fa-2x fa-star"></a>';
                                      } else{
                                          echo '<a id="star"  href="index.php?action=sanpham&act=detail&id='.$_GET['id'].'&star='.$i.'" class="fa fa-star"></a>';

                                      }
                                  }
//                              }
                                ?>
                            </div>
                        <p class="product-description">
                            <?php echo $mota; ?>
                        </p>
                        <h4 class="price fw-bold fa-2x" style="color: red">Giá bán:<?php echo $dongia; ?> $</h4>
                        </br></br>
                        Số Lượng:
                        <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="30"/>
                        <?php
                        $tam = true;
                        $hh = new hanghoa();
                        $slt = $hh->getslt($_GET['id']);
                        $slm = $hh->getslm($_GET['id']);
                        
                
                        if($slm){
                            $result = $slt[0] - $slm['tongsoluong'];
                            if($result <= 0){
                                $tam= false;
                            }
                        }
                        
                        ?>
                        <div class="action">
                            <h3 <?php if($tam) echo "hidden"?>>Out Of Stock</h3>
                            <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal"
                                    data-target="#myModal" <?php if(!$tam) echo "disabled"?> >MUA NGAY
                            </button>
                        </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>

    </div>
</section>
<?php
if(isset($_SESSION['ma'])):
?>
<section>
<div class="col-12">
    <div class="row">
        <?php
        if(isset($_GET['id'])){
            $mahh = $_GET['id'];
            $cmt= new comment();
            $tong = $cmt->countComment($mahh);
        }
        ?>
        <p class="float-left"><b>BÌnh luận: <?php echo $tong;?> </b></p>
        <hr>
    </div>
<form action="index.php?action=sanpham&act=cmt&id=<?php echo $_GET['id']?>" method="post">
    <div class="row">
        <div class="col-md-1">
            <input type="hidden" name="mahh" value="<?php echo $_GET['id']?>"/>
            <input type="hidden" name="sosao" value="<?php if(isset($_GET['star'])) echo $_GET['star']?>"/>
            <img src="Content/images/people.png" width="50px" height="50px"/>

        </div>
        <div class="col-md-8">
                   <textarea class="input-field form-control" type="text" name="comment" rows="2" cols="70" id="comment"
                             placeholder="Thêm bình luận">  </textarea>
            <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận"/>

        </div>

    </div>

</form>
<div class="row">

    <p class="float-left"><b>Các bình luận</b></p>
    <hr>
</div>
<div class="row">
    <?php
    $result = $cmt->GetCommentAll($_GET['id']);
    while ($set = $result->fetch()):
    ?>
    <div class="col-12">
           <div class="row">
               <div>
                   <img src="Content/images/people.png" alt="" style="width: 100px"">
               </div>
               <div>
                   <?php
                   for($i=1;$i<=5;$i++){
                       if($i <= $set['sosao']){
                           echo '<span id="star2" class="fa fa-2x fa-star"></span>';
                       } else{
                           echo '<span id="star" class="fa fa-star"></span>';

                       }
                   }

                   ?>
                   <br>
                   <p class="fa-2x" style="float: left;display: contents"><?php echo'<b>'.$set['username'].':</b>'.$set['noidung']?></p>
                   <hr>
               </div>


           </div>
    </div>

    <?php
endwhile;
 ?>

    <br/>
        </div>
</div>
</section>
<?php
endif;
?>

