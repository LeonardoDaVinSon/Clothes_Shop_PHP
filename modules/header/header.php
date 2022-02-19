<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php"><img src="images/logo.png" alt="" style="width: 300px;height: 50px;"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="<?php if(!isset($_GET['page_layout'])){echo "active";} ?>" ><a href="index.php">Trang chủ</a></li>
								<li class="has-dropdown <?php if($_GET['page_layout'] == 'shop'){echo "active";} ?>">
									<a  href="index.php?page_layout=shop">Cửa hàng</a>
									<ul class="dropdown">
										<li class="<?php if($_GET['page_layout'] == 'cart'){echo 'active';} ?>"><a  href="index.php?page_layout=cart">Giỏ hàng</a></li>
										<li class="<?php if($_GET['page_layout'] == 'checkout'){echo 'active';} ?>"><a  href="index.php?page_layout=checkout">Thanh toán</a></li>

									</ul>
								</li>
								<li class="<?php if($_GET['page_layout'] == 'about'){echo 'active';} ?>"><a  href="index.php?page_layout=about">Giới thiệu</a></li>
								<li class="<?php if($_GET['page_layout'] == 'contact'){echo 'active';} ?>"><a  href="index.php?page_layout=contact">Liên hệ</a></li>
								<li class="<?php if($_GET['page_layout'] == 'cart'){echo 'active';} ?>">
									<a  href="index.php?page_layout=cart"><i class="icon-shopping-cart"></i> Giỏ hàng [<?php include_once("modules/cart/cart_count.php") ?>]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/bg-03.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Sale</h1>
											<h2 class="head-3">45%</h2>
											<p class="category"><span>Những mẫu thiết kế mới</span></p>
											<p><a href="index.php?page_layout=contact" class="btn btn-primary">Kết nối với shop</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/bg-01.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Sale</h1>
											<h2 class="head-3">45%</h2>
											<p class="category"><span>Những mẫu thiết kế mới</span></p>
											<p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/bg-02.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Sale</h1>
											<h2 class="head-3">45%</h2>
											<p class="category"><span>Những mẫu thiết kế mới</span></p>
											<p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>