<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
				<h2><span>Sản phẩm Nổi bật</span></h2>
				<p>Đây là những sản phẩm được ưa chuộng nhất năm 2021</p>
			</div>
		</div>
		<div class="row">
			<?php
			$sql_feature_prd = "SELECT * FROM products WHERE featured = 1 ORDER BY prd_id DESC LIMIT 4 ";
			$query_feature_prd = mysqli_query($conn, $sql_feature_prd);
			while($row = mysqli_fetch_array($query_feature_prd)){

			?>
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(admin/images/products/<?= $row['image'] ?>);">
						<div class="cart">
							<p>
								<span class="addtocart"><a href="modules/cart/cart_add.php?prd_id=<?= $row['prd_id'] ?>"><i class="icon-shopping-cart"></i></a></span>
								<span><a href="index.php?page_layout=detail&prd_id=<?= $row['prd_id'] ?>"><i class="icon-eye"></i></a></span>


							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="index.php?page_layout=detail&prd_id=<?= $row['prd_id'] ?>"><?= $row['name'] ?></a></h3>
						<p class="price"><span> <?php number_format($row['price'])?></span></p>
					</div>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>