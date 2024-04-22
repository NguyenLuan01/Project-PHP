<input type="number" min="1" max="100">
<section class="category">

    <h1 class="title"><span>our categories</span> <a href="index.php?action=sanpham&model=all">view all >></a></h1>

    <div class="box-container">

        <a href="index.php?action=sanpham&model=housesofa" class="box">
            <img src="Content/image/icon-1.png" alt="">
            <h3>house sofa</h3>
        </a>

        <a href="index.php?action=sanpham&model=workingtable" class="box">
            <img src="Content/image/icon-2.png" alt="">
            <h3>working table</h3>
        </a>

        <a href="index.php?action=sanpham&model=cornertable" class="box">
            <img src="Content/image/icon-3.png" alt="">
            <h3>corner table</h3>
        </a>

        <a href="index.php?action=sanpham&model=officechair" class="box">
            <img src="Content/image/icon-4.png" alt="">
            <h3>office chair</h3>
        </a>

        <a href="index.php?action=sanpham&model=newwardrobe" class="box">
            <img src="Content/image/icon-5.png" alt="">
            <h3>new wardrobe</h3>
        </a>

    </div>

</section>

<section class="products">

    <h1 class="title"><span>our products sale</span> <a href="index.php?action=sanpham&note=sale">view all >></a></h1>

    <div class="box-container">

        <?php
        $db = new  hanghoa();
        $result = $db->getsale();
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

                    <div class="price" style=" font-weight: bold"><span
                                style="color: red">$<?php echo $set['giamgia'] ?>.00</span>
                        <del style="text-decoration: line-through">$<?php echo $set['dongia'] ?>.00</del>
                    </div>
                    <h3><a style="color: #244d4d;" id="link"
                           href="index.php?action=sanpham&act=detail&id=<?php echo $set['mahh'] ?>"><?php echo $set['tenhh'] ?> </a>
                    </h3>                    <div class="stars">
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