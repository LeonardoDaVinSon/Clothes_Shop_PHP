<?php
if(!defined("SECURITY")){
	die("Bạn không có quyền truy cập vào file này!");
}
?>
<!DOCTYPE html>
<html>

<?php
include_once("modules/layouts/head.php");
?>

<body>
	<!-- header -->
	<?php
	include_once("modules/layouts/header.php");
	?>
	<!-- header -->
	<!-- sidebar left-->
	<?php
	include_once("modules/layouts/sidebar.php");
	?>
	<!--/. end sidebar left-->

	<!-- master page layout  -->
	<?php
	if(isset($_GET['page_layout'])){
		switch($_GET['page_layout']){
		//User
		case "user": include_once("modules/user/user.php"); break;
		case "edit_user": include_once("modules/user/edit_user.php"); break;
		case "add_user": include_once("modules/user/add_user.php"); break;
		// Product
		case "product": include_once("modules/product/product.php"); break;
		case "edit_product": include_once("modules/product/edit_product.php"); break;
		case "add_product": include_once("modules/product/add_product.php"); break;
		//// category
		case "category": include_once("modules/category/category.php"); break;
		case "edit_category": include_once("modules/category/edit_category.php"); break;
		case "add_category": include_once("modules/category/add_category.php"); break;
		//// Order
		case "order": include_once("modules/order/order.php"); break;
		case "edit_order": include_once("modules/order/edit_order.php"); break;
		case "add_order": include_once("modules/order/add_order.php"); break;
		
		}
	}else{
		include_once("dashboard.php");
	}
	?>

	<!-- end master page layout  -->


	<!-- javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>

</body>

</html>