<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">-->
<style>


nav,
.wrapper {
padding: 10px 50px
}
nav .logo a {
color: #000;
font-size: 1.2rem;
font-weight: bold;
text-decoration: none
}
nav div.ml-auto a {
    position: relative;
    right: -20px;
text-decoration: none;
font-weight: 600;
font-size: 0.8rem
}
header {
padding: 20px 0px
}
header .active {
font-weight: 700;
position: relative
}
header .active .fa-check {
position: absolute;
left: 50%;
bottom: -27px;
background-color: #fff;
font-size: 0.7rem;
padding: 5px;
border: 1px solid #008000;
border-radius: 50%;
color: #008000
}
.progress {
height: 2px;
background-color: #ccc
}
.progress div {
display: flex;
align-items: center;
justify-content: center
}
.progress .progress-bar {
width: 40%
}
#details {
padding: 30px 50px;
min-height: 300px
}
input {
border: none;
outline: none
}
.form-group .d-flex {
border: 1px solid #ddd
}
.form-group .d-flex input {
width: 95%
}
.form-group .d-flex:hover {
color: #000;
cursor: pointer;
border: 1px solid #008000
}
select {
width: 100%;
padding: 8px 5px;
border: 1px solid #ddd;
border-radius: 5px
}
input[type="checkbox"]+label {
font-size: 0.85rem;
font-weight: 600
}
#address,
#cart,
#summary {
padding: 20px 50px
}
#address .d-md-flex p.text-justify,
#register p.text-muted {
margin: 0
}
#register {
background-color: #d9ecf2
}
#register a {
text-decoration: none;
color: #333
}
#cart,
#summary {
max-width: 500px
}
.h6 {
font-size: 1.2rem;
font-weight: 700
}
.h6 a {
text-decoration: none;
font-size: 1rem
}
.item img {
object-fit: cover;
border-radius: 5px
}
.item {
position: relative
}
.number {
    display: flex;
    justify-content: center;
    align-items: center;
position: absolute;
font-weight: 800;
color: #fff;
background-color: #0033ff;
padding-left: 1px;
border-radius: 50%;
border: 1px solid #fff;
width: 25px;
height: 25px;
top: -5px;
right: -5px
}
.display-5 {
font-size: 1.2rem
}
#cart~p.text-muted {
margin: 0;
font-size: 0.9rem
}
tr.text-muted td {
border: none
}
.fa-minus,
.fa-plus {
font-size: 0.7rem
}
.table td {
padding: 0.3rem
}
.btn.text-uppercase {
border: 1px solid #333;
font-weight: 600;
border-radius: 0px
}
.btn.text-uppercase:hover {
background-color: #333;
color: #eee
}
.btn.text-white {
background-color: #66cdaa;
border-radius: 0px
}
.btn.text-white:hover {
background-color: #3cb371
}
.wrapper .row+div.text-muted {
font-size: 0.9rem
}
.mobile,
#mobile {
display: none
}
.buttons {
vertical-align: text-bottom
}
#register {
width: 50%
}
@media(min-width:768px) and (max-width: 991px) {
.progress .progress-bar {
width: 33%
}
#cart,
#summary {
max-width: 100%
}
.wrapper div.h5.large,
.wrapper .row+div.text-muted {
display: none
}
.mobile.h5,
#mobile {
display: block
}
}
@media(min-width: 576px) and (max-width: 767px) {
.progress .progress-bar {
width: 29%
}
#cart,
#summary {
max-width: 100%
}
.wrapper div.h5.large,
.wrapper .row+div.text-muted {
display: none
}
.mobile.h5,
#mobile {
display: block;
}
.buttons {
width: 100%
}
}
@media(max-width: 575px) {
.progress .progress-bar {
width: 38%
}
#cart,
#summary {
max-width: 100%
}
nav,
.wrapper {
padding: 10px 30px
}
#register {
width: 100%
}
}
@media(max-width: 424px) {
body {
width: fit-content
}
}
@media(max-width: 375px) {
.progress .progress-bar {
width: 35%
}
body {
    font-size: 20px;
}
}
</style>
<nav class="bg-white">
<div class="d-flex align-items-center">
<div class="logo"> <a href="#" class="text-uppercase">shop</a> </div>
<div class="ml-auto"> <a href="#" class="text-uppercase">Back to shopping</a> </div>
</div>
</nav>
<header>
<div class="d-flex justify-content-center align-items-center pb-3">
<div class="px-sm-5 px-2 active">SHOPPING CART <span class="fas fa-check"></span> </div>
<div class="px-sm-5 px-2">CHECKOUT</div>
<div class="px-sm-5 px-2">FINISH</div>
</div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</header>
<div class="wrapper">
<div class="h5 large">Billing Address</div>
<div class="row">
<div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
<div class="mobile h5">Billing Address</div>
<div id="details" class="bg-white rounded pb-5">
<form>
    <?php
    $hd =new hoadon();
    $result = $hd->getOrder($_SESSION['sohd']);
    $sohd = $result['masohd'];
    $tenkh=$result['tenkh'];
    $diachi  =$result['diachi'];
    $sodt = $result['sodienthoai'];
    $ngaydat = $result['ngaydat'];
    $mail = $result['email'];
    $d=new DateTime($ngaydat);
    ?>
<div class="form-group"> <label class="text-muted">Name</label> <input type="text" value="<?php echo $tenkh; ?>" class="form-control"> </div>
<div class="form-group"> <label class="text-muted">Email</label>
<div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="email" value="<?php echo $mail; ?>"> <span class="fas fa-check text-success pr-sm-2 pr-0"></span> </div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group"> <label>City</label>
<div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="Ho Chi Minh"> <span class="fas fa-check text-success pr-2"></span> </div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group"> <label>số hoá đơn</label>
<div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="<?php echo $sohd; ?>"> <span class="fas fa-check text-success pr-2"></span> </div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group"> <label>Address</label>
<div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="<?php echo $sodt ?>"> <span class="fas fa-check text-success pr-2"></span> </div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group"> <label>Number Phone</label>
<div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="text" value="<?php echo $diachi ?>"> <span class="fas fa-check text-success pr-2"></span> </div>
</div>
</div>
    <div class="col-lg-6">
<div class="form-group"> <label>Date</label>
<div class="d-flex jusify-content-start align-items-center rounded p-2"> <input type="Date" value="<?php echo $ngaydat; ?>"> <span class="fas fa-check text-success pr-2"></span> </div>
</div>
</div>
</div>
<!--    <label>Country</label><select name="country" id="country">-->
<!--<option value="usa">USA</option>-->
<!--<option value="ind">INDIA</option>-->
<!--</select>-->
</form>
</div>  <label></label>
<div id="address" class="bg-light rounded mt-3">
<div class="h5 font-weight-bold text-primary"> </div>
<div class="d-md-flex justify-content-md-start align-items-md-center pt-3">
<div class="mr-auto"> <b></b>
<p class="text-justify text-muted"></p>
<p class="text-uppercase text-muted"></p>
</div>
<div class="rounded py-2 px-3" id="register"> <a href="#"> <b></b> </a>
<p class="text-muted"></p>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
<div id="cart" class="bg-white rounded">
<div class="d-flex justify-content-between align-items-center">
<div class="h6">Cart Summary</div>
<div class="h6"> <a href="index.php?action=giohang">Edit</a> </div>
</div>
    <?php
    if(isset($_SESSION['cart'])):
    $cart = $_SESSION['cart'];
    foreach ($cart as $key => $value):
    ?>

<div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
<div class="item pr-2"> <img src="Content/image/<?php echo $cart[$key]['hinh']; ?>" alt="" width="80" height="80">
<div class="number"><?php echo $cart[$key]['soluong']; ?></div>
</div>
        <div class="d-flex flex-column px-3"> <b class="h5"><?php echo $cart[$key]['ten']; ?></b>  </div>
        <div class="ml-auto"> <b class="h5">$<?php echo $cart[$key]['total']; ?></b> </div>
</div>
    <?php
    endforeach;
    endif;
    ?>
<div class="my-3"> <input type="text" class="w-100 form-control text-center" placeholder="Gift Card or Promo Card"> </div>
<div class="d-flex align-items-center fa-2x " style="justify-content: space-between">
<div class="display-5 fw-bold">Total</div>
<div class="ml-auto font-weight-bold"><b style="color: red">$<?php if(isset($_SESSION['tongtien'])) echo $_SESSION['tongtien'];?></b></div>
</div>
<div class="d-flex align-items-center py-2">
</div>
</div>
<div class="row pt-lg-3 pt-2 buttons mb-sm-0 mb-2">
<div class="col-md-6">
<a class="btn text-uppercase" href="index.php?action=sanpham&model=all">back to shopping</a>
</div>
<div class="col-md-6 pt-md-0 pt-3">
<a href="index.php?action=order&act=dell" class="btn text-white ml-auto"> Hoàn tất thanh toán </a>
</div>
</div>
<div class="text-muted pt-3" id="mobile"> <span class="fas fa-lock"></span> Your information is save </div>
</div>
</div>
<div class="text-muted"> <span class="fas fa-lock"></span> Your information is save </div>
</div>
<script type="text/javascript"></script>