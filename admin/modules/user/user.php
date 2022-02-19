<!--main-->
<?php
if(!defined("SECURITY")){
	die("Bạn không có quyền truy cập vào file này!");
}
//phân trang
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page =1;
}
$row_per_page = 3;
$per_row = $page*$row_per_page - $row_per_page;

$total_row = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$total_page = ceil($total_row/$row_per_page);

$list_page ='' ;

$page_prev = $page - 1;
if($page_prev <= 0){
    $page_prev =1;
}
$list_page.= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$page_prev.'">&laquo;</a></li>';

for($i=1; $i<= $total_page; $i++){
    if($i==$page){ 
        $active = "active";
    }
    else{
        $active='';
    }
    $list_page.='<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=user&page='.$i.'">'.$i.'</a></li>';

}

$page_next ='';
$page_next = $page + 1;
if($page_next > $total_page){
    $page_next = $total_page;
}
$list_page.='<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$page_next.'">&raquo;</a></li>';

//truy vấn
$sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT $per_row, $row_per_page";
$query = mysqli_query($conn,$sql);

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh sách thành viên</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh sách thành viên</h1>
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
							<a href="adduser.html" class="btn btn-primary">Thêm Thành viên</a>
							<table class="table table-bordered" style="margin-top:20px;">

								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Email</th>
										<th>Full</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Level</th>
										<th width='18%'>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
								<?php
								while($row = mysqli_fetch_array($query)){
								?>
									<tr>
										<td><?= $row["user_id"] ?></td>
										<td><?= $row["user_mail"] ?></td>
										<td><?= $row["user_full"] ?></td>
										<td><?= $row["user_address"] ?></td>
										<td><?= $row["user_phone"] ?></td>
										<td><?= $row["user_level"] ?></td>
										<td>
											<a href="index.php?page_layout=edit_user&prd_id=<?= $row['user_id'] ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a href="del_products.php?user_id=<?= $row['user_id'] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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