<header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-lightbulb"></i> Foxer </a>

    <form action="index.php?action=sanpham&model=find" class="search-form" method="post">
        <input style="text-transform: none" type="search" value="<?php if(isset($_POST['valueFind'])) echo $_POST['valueFind'];?>" name="valueFind" placeholder="search here..." id="search-box">
        <button type="submit" style="background: white"><label for="search-box" class="fas fa-search"></label></button>
    </form>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <a href="index.php?action=giohang">
            <div id="cart-btn" class="fas fa-shopping-cart"></div>

        </a>
        <?php
        if (isset($_SESSION['ma'])) {
            echo '<a href="index.php?action=dangnhap&act=logout">
            <div id="login" class="fas fa-sign-out-alt">
            </div>
        </a>';
        } else {
            echo '<a href="index.php?action=dangnhap">
            <div id="login" class="fas fa-user">
            </div>
        </a>';
        }
        ?>

        <?php
        if (isset($_SESSION['ma']) && isset($_SESSION['ten'])) {
            echo '<p style="color: darkcyan; margin-top: 20px; margin-left: 0px;">xin
            chao,' . $_SESSION['ten'] . ' </p>';
        }
        ?>


    </div>

</header>

<!-- header section ends  -->

<!-- closer btn  -->

<div id="closer" class="fas fa-times"></div>

<!-- navbar  -->

<nav class="navbar">
    <a href="index.php">home</a>
    <a href="shop.php">shop</a>
    <a href="about.html">about</a>
    <a href="team.html">team</a>
    <a href="blog.html">blog</a>
    <a href="contact.html">contact</a>
    <a href="index.php?action=changePass">Change Password</a>
</nav>

<!-- shopping cart  -->

<div class="shopping-cart">
    <div class="box">
        <i class="fas fa-times"></i>
        <img src="Content/image/cart-img-1.jpg" alt="">
        <div class="content">
            <h3>morden furniture</h3>
            <span class="quantity"> 1 </span>
            <span class="multiply"> x </span>
            <span class="price"> $140.00 </span>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-times"></i>
        <img src="Content/image/cart-img-2.jpg" alt="">
        <div class="content">
            <h3>morden furniture</h3>
            <span class="quantity"> 1 </span>
            <span class="multiply"> x </span>
            <span class="price"> $140.00 </span>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-times"></i>
        <img src="Content/image/cart-img-3.jpg" alt="">
        <div class="content">
            <h3>morden furniture</h3>
            <span class="quantity"> 1 </span>
            <span class="multiply"> x </span>
            <span class="price"> $140.00 </span>
        </div>
    </div>

    <div class="box">
        <i class="fas fa-times"></i>
        <img src="Content/image/cart-img-4.jpg" alt="">
        <div class="content">
            <h3>morden furniture</h3>
            <span class="quantity"> 1 </span>
            <span class="multiply"> x </span>
            <span class="price"> $140.00 </span>
        </div>
    </div>

    <h3 class="total"> total : <span>$560.00</span></h3>

    <a href="#" class="btn">checkout cart</a>

</div>

<!-- login form  -->

<div class="login-form">

    <form action="">
        <h3>login form</h3>
        <input type="email" placeholder="enter your email" class="box">
        <input type="password" placeholder="enter your password" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <input type="submit" value="login now" class="btn">
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have an account? <a href="#">create now</a></p>
    </form>

</div>

<!-- home section starts  -->

<section class="home">

    <div class="slides-container">

        <div class="slide active">
            <div class="content">
                <span>new arrivals</span>
                <h3>flexible chair</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quisquam, magnam enim sed
                    debitis perspiciatis.</p>
                <a href="index.php?action=sanpham&model=all" class="btn">shop now</a>
            </div>
            <div class="image">
                <img src="Content/image/home-img-1.png" alt="">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>new arrivals</span>
                <h3>flexible chair</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quisquam, magnam enim sed
                    debitis perspiciatis.</p>
                <a href="index.php?action=sanpham&model=all" class="btn">shop now</a>
            </div>
            <div class="image">
                <img src="Content/image/home-img-2.png" alt="">

            </div>
        </div>

    </div>

    <div id="slide-next" onclick="next()" class="fas fa-angle-right"></div>
    <div id="slide-prev" onclick="prev()" class="fas fa-angle-left"></div>

</section>