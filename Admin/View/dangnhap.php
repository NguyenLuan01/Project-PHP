<div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x" style="color:#fff">Admin | Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
                            <?php
                            if(isset($_GET['action'])){
                            if($_GET['action']=='changepass' ){ ?>
                                <form method="post" action="index.php?action=changepass&act=changepass_action" class="login-form">
									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" disabled value="<?php if(isset($_SESSION['admin']))echo $_SESSION['admin'];?>"" placeholder="Username" name="txtusername" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Old Password</label> <br>
                                    <span><?php if(isset($old_passErr)) echo $old_passErr?></span>
                                    <input type="password" placeholder="Password" name="old_pass" class="form-control mb">
                                    <label for="" class="text-uppercase text-sm">New Password</label> <br>
                                    <span><?php if(isset($new_passErr)) echo $new_passErr?></span>
									<input type="password" placeholder="Password" name="new_pass" class="form-control mb">


									<button class="btn btn-primary btn-block" name="login" type="submit">CHANGE</button>
								</form>
                            <?php
                            }} else {?>
                                <form method="post" action="index.php?action=dangnhap&act=dangnhap_action" class="login-form">

                                    <label for="" class="text-uppercase text-sm">Your Username </label>
                                    <input type="text" placeholder="Username" name="txtusername" class="form-control mb">

                                    <label for="" class="text-uppercase text-sm">Password</label>
                                    <input type="password" placeholder="Password" name="txtpassword" class="form-control mb">


                                    <button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>
                                </form>

                                <?php
                            }
                            ?>
			<p style="margin-top: 4%" align="center"><a href="index.php">Back to Home</a>	</p>
							</div>

						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>