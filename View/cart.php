<style>
</style>
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="display-5 mb-2  text-center">Shopping Cart</h3>
                <p class="mb-5 text-center fa-2x">
                    <i class="text-info font-weight-bold"><?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart'])?></i> items in your cart</p>
                <form action="index.php?action=giohang&act=fix" method="post">

                <table id="shoppingCart" class="table table-condensed table-responsive">
                    <thead style="font-size: 20px">
                    <tr>
                        <th style="width:60%">Product</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:10%">Thành Tiền</th>
                        <th style="width:16%"></th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php
                    $tongtien = 0;
                    if (isset($_SESSION['cart'])) :
                        $cart = $_SESSION['cart'];

                    foreach ($cart as $key => $value):
                    ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-md-3 text-left">
                                    <img src="Content/image/<?php echo $cart[$key]['hinh']; ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                </div>
                                <div class="col-md-9 text-left mt-sm-2 ">
                                    <h4 class="fa-2x"><?php echo $cart[$key]['ten']; ?></h4>
                                    <p class="font-weight-light">Brand &amp; Name</p>
                                </div>
                            </div>
                        </td>
                        <td  style="color: red" class="fa-2x"><?php  echo (($cart[$key]['giamgia']>0)? $cart[$key]['giamgia']: $cart[$key]['dongia']); ?><u>$</u></td>

                        <td data-th="Quantity">
                            <input type="number" class="form-control form-control-lg text-center"
                                   name="newqty[<?php echo $key; ?>]"
                                   value="<?php echo $cart[$key]['soluong']; ?>"/>
                        </td>
                        <td class="fa-2x " style="color: red"><?php echo $cart[$key]['total']; ?> <u>$</u></td>
                        <td class="actions" >
                            <div class="" >
                                <button type="submit" class=" btn btn-success mb-2" style="background: #ff9f1a">
                                    <i class="fas fa-sync "></i>
                                </button>
                                <a href="index.php?action=giohang&act=del&id=<?php echo $key; ?>">
                                    <button class="btn btn-success mb-2" style="background: darkred" type="button" >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                        <?php
                        $tongtien = $tongtien + $cart[$key]['total'];
                        $_SESSION['tongtien'] = $tongtien;
                    endforeach;
                    endif;
                    ?>
                    </tbody>
                </table>
                </form>

                <div style="display: flex;justify-content: space-between">
                    <div>
                        <a href="index.php?action=giohang&act=delAll">
                            <button class="btn btn-success mb-2" style="background: darkred" type="button" >
                                <u style="font-weight: bold">Delete All</u>
                            </button>
                        </a>

                    </div>
                    <div>
                        <h4>Subtotal:</h4>
                        <h1 style="color: red"> <b> <?php echo $tongtien; ?><u>$</u></b>
                        </h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-sm-6 order-md-2 text-right">
                <a href="index.php?action=order" class=" btn-primary  mb-4 btn-lg px-5 py-3" style="">Checkout</a>
            </div>
            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                <a href="catalog.html">
                    <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
            </div>
        </div>
    </div>
</section>