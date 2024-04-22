<!-- quảng cáo -->
<!--  -->
<!--    include "quangcao.php";-->

<!-- end quảng cáo -->
<?php
$hh  = new hanghoa();
$result = $hh -> getAll();
$count = $result->rowCount();

$limit = 8;

$p = new page();

$page = $p->findPage($count,$limit);
$start  = $p->findStart($limit);

$current_page = isset($_GET['page'])?$_GET['page']:1;
$ac="";
if (isset($_GET['note']) == "sale") {
    $ac = 0;
}
if(isset($_GET['model'])){
if ($_GET['model'] == "find") {
    $ac = 2;
}
if ($_GET['model'] == "all") {
    $ac = 1;
}
if(!$ac){
    $ac=1;
}
}
?>

<!-- end số lượt xem san phẩm -->
<!-- sản phẩm-->


<!--Section: Examples-->
<section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row">
        <div class="col-md-12 text-right">
            <section class="heading">
                <?php
                if($ac==0){
                    echo '<h3>shop sale</h3>';
                }
                if ($ac==1){
                    echo '<h3>our shop</h3>';
                }
                if($ac==2){
                    echo '<h3>result of search</h3>';

                }
                ?>
                <p><a href="index.php">home</a> / <span>shop</span></p>
            </section>

        </div>

    </div>
</section>
<!--Grid row-->
<!--      <div class="row">-->
<div class="row">
    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']?>" style="float: left">
        <label class="fa-2x">Bộ Lọc:</label>
        <select name="sx"  class="form-select w-25"  aria-label="Default select example">
            <option value="default" selected >-- Theo Giá  --</option>
            <option <?php if(isset($_SESSION['sx'])){if($_SESSION['sx'] == 'ASC') echo 'selected';}?> value="ASC">Tăng dần</option>
            <option <?php if(isset($_SESSION['sx'])){if($_SESSION['sx'] == 'DESC') echo 'selected';}?> value="DESC">Giảm dần</option>
        </select> <br>
        <button name="submitsx" class="btn bg-primary" style="float: none">Áp dụng</button>
    </form>
</div>

<!--Grid column-->
<section class="products">
    <div class="box-container">

        <?php
        $db = new  hanghoa();
        $model = null;
        if (isset($_GET['model'])) {
            $model = $_GET['model'];
        }
        switch ($model) {
            case null:
                $result = $db->getSaleAll();
                break;
            case 'housesofa':
                $result = $db->getLoai(1);
                break;
            case 'workingtable':
                $result = $db->getLoai(2);
                break;
            case 'cornertable':
                $result = $db->getLoai(3);
                break;
            case 'officechair':
                $result = $db->getLoai(4);
                break;
            case 'newwardrobe':
                $result = $db->getLoai(5);
                break;
            case 'find':
                $result = $db->getTimkiemhh($_POST['valueFind']);
                break;
            case 'all':
                $result = $db->getListHangHoaAllPage($start,$limit);
                break;

        }
        while ($set = $result->fetch()):

            ?>

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="Content/image/<?php echo $set['hinh'] ?>" alt="">
                </div>
                <div class="content">
                    <?php
                    if ($set['giamgia'] > 0):
                        ?>
                        <div class="price" style=" font-weight: bold"><span
                                    style="color: red">$<?php echo $set['giamgia'] ?>.00</span>
                            <del style="text-decoration: line-through">$<?php echo $set['dongia'] ?>.00</del>
                        </div>
                    <?php
                    endif;
                    if ($set['giamgia'] == 0):
                        ?>
                        <div class="price" style=" font-weight: bold"><span
                                    style="color: red">$<?php echo $set['dongia'] ?>.00</span></div>
                    <?php
                    endif;
                    ?>
                    <h3><a style="color: #244d4d;" id="link"
                           href="index.php?action=sanpham&act=detail&id=<?php echo $set['mahh'] ?>"><?php echo $set['tenhh'] ?> </a>
                    </h3>

                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span> (<?php echo $set['soluotxem'] ?>) </span>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>

</section>

<!--              </div>-->

<!--Grid row-->


<!-- end sản phẩm mới nhất -->

<style>
    .pagination>li>a{
        padding:5px 15px ;
    }
</style>
<nav aria-label="Page navigation example" style="display: flex;justify-content: center" >
    <ul class="pagination fa-2x">
        <?php
        if($current_page>1 && $page>1)
        {
            echo '<li class="page-item"><a class="page-link" href="index.php?action=sanpham&model=all&page='.($current_page-1).'">Prev</a></li>';
        }
        for ($i=1;$i<=$page;$i++){
            ?>
            <li  class="page-item"><a class="page-link" href="index.php?action=sanpham&model=all&page=<?php echo $i;  ?>"><?php echo $i; ?></a></li>
            <?php
        }
        if ($current_page < $page && $page>1){
            echo '<li class="page-item"><a class="page-link" href="index.php?action=sanpham&model=all&page='.($current_page+1).'">Next</a></li>';

        }
        ?>
    </ul>
</nav>