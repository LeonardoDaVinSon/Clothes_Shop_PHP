<!--main-->
<?php
if (!defined("SECURITY")) {
	die("Bạn không có quyền truy cập vào file này!");
}
//phân trang
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$row_per_page = 5;
$per_row = $page * $row_per_page - $row_per_page;

$total_row = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
$total_page = ceil($total_row / $row_per_page);

$list_page = '';

$page_prev = $page - 1;
if ($page_prev <= 0) {
	$page_prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page=' . $page_prev . '">&laquo;</a></li>';

for ($i = 1; $i <= $total_page; $i++) {
	if ($i == $page) {
		$active = "active";
	} else {
		$active = '';
	}
	$list_page .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=product&page=' . $i . '">' . $i . '</a></li>';
}

$page_next = '';
$page_next = $page + 1;
if ($page_next > $total_page) {
	$page_next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page=' . $page_next . '">&raquo;</a></li>';

//truy vấn
$sql = "SELECT * FROM products INNER JOIN categories WHERE products.cat_id = categories.id ORDER BY prd_id DESC LIMIT $per_row, $row_per_page";
$query = mysqli_query($conn, $sql);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh sách sản phẩm</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh sách sản phẩm</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">

				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<div class="alert bg-success" role="alert">
								<svg class="glyph stroked checkmark">
									<use xlink:href="#stroked-checkmark"></use>
								</svg>Đã thêm thành công<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
							<a href="index.php?page_layout=add_product" class="btn btn-primary">Thêm sản phẩm</a>
							<table class="table table-bordered" style="margin-top:20px;">

								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Thông tin sản phẩm</th>
										<th>Giá sản phẩm</th>
										<th>Tình trạng</th>
										<th>Danh mục</th>
										<th width='18%'>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ($row = mysqli_fetch_array($query)) {
									?>
										<tr>
											<td><?= $row['prd_id'] ?></td>
											<td>
												<div class="row">
													<div class="col-md-3"><img src="images/products/<?= $row['image'] ?>" alt="Áo đẹp" width="100px" class="thumbnail"></div>
													<div class="col-md-9">
														<p><strong><?= $row['code'] ?></strong></p>
														<p>Tên sản phẩm : <?= $row['name'] ?></p>
													</div>
												</div>
											</td>
											<td><?= number_format($row['price']) ?> VND</td>
											<td>
												<?php
												if ($row['state'] == 1) {
													echo '<span class="label label-success">Còn hàng</span>';
												} else {
													echo '<span class="label label-danger">Hết hàng</span>';
												}
												?>
											</td>
											<td><?= $row['cat_name'] ?></td>
											<td>
												<a href="index.php?page_layout=edit_product&prd_id=<?= $row['prd_id'] ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<!-- Nút xóa sản phẩm  -->
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
												<i class="fa fa-trash" aria-hidden="true"></i> Xóa
												</button>
												
												<!-- Modal -->
												<div class="modal fade" id="exampleModal" tabindex="-1" style="margin-top: 15%;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																Bản có chắc chắn muốn xóa sản phẩm <?= $row['name'] ?> không ?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
																<!-- <button type="button" class="btn btn-primary">Chắc chắn</button> -->
																<a href="modules/product/del_product.php?prd_id=<?= $row['prd_id'] ?>" class="btn btn-danger"> Xóa</a>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
									<?php
									}
									?>


								</tbody>
							</table>
							<div align='right'>
								<ul class="pagination">
									<?= $list_page ?>
									<!-- <li class="page-item"><a class="page-link" href="#">Trở lại</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">tiếp theo</a></li> -->
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>
			</div>
			<!--/.row-->


		</div>
	</div>
</div>

<!--end main-->

<!-- javascript -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>