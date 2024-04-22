  <!-- quảng cáo -->
<!--  -->
<!--    include "quangcao.php";-->

  <!-- end quảng cáo -->
  
  
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
 

  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
             
          </div>

      </div>
      <!--Grid row-->
      <div class="row">
          <?php
          $hh = new hanghoa();
          $result = $hh->getAllsale();
          while ($set = $result->fetch() ):

          ?>
         
              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                      <img src="Content/imagetourdien/<?php echo $set['hinh'];?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>

                  <h5 class="my-4 font-weight-bold" style="color: red;" ><?php echo $set['dongia'] ?> <sup>  <u>đ</u></sup></h5>
                  <a href="">
                      <span> <?php echo $set['tenhh'] ?></span></br></a>
                  <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                  <h5>Số lượt xem:</h5>

              </div>
          <?php

          endwhile;
          ?>
      </div>

      <!--Grid row-->

  </section>
 
  
  <!-- end sản phẩm mới nhất -->
  
 
  <div class="col-md-6 div col-md-offset-3">
				<ul class="pagination">
					
				    <li ><a href=""></a></li>
				   
				</ul>
</div>