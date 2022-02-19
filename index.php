<?php
ob_start();
session_start();
define("SECURITY",true);
include_once("config/connect.php");
?>
<!DOCTYPE HTML>
<html>

<!-- head  -->
<?php
include_once("modules/head/head.php");

?>
<!-- end head -->

<body>
		<!--header -->
		<?php
		include_once("modules/header/header.php");
		?>
		<!-- End header -->
		<!-- main -->

		<?php
                if(isset($_GET['page_layout'])){
                    switch($_GET['page_layout']){
						case "shop": include_once("modules/shop/shop.php"); break;
                        case "contact": include_once("modules/contact/contact.php"); break;
                        case "about": include_once("modules/contact/about.php"); break;
                        case "cart": include_once("modules/cart/cart.php"); break;
                        case "checkout": include_once("modules/cart/checkout.php"); break;
                        case "detail": include_once("modules/product/detail.php"); break;
						

                    }
                }else{
					// ads 
					include_once("modules/main/ads.php");
					//end ads
					
					// feature product 
                    include_once("modules/product/feature_product.php");
					// end feature product 

					// new product 
                    include_once("modules/product/new_product.php");
					// end new product 
					
                }
        ?>

		<!-- end main -->

		<!-- subscribe -->
		<?php
		include_once("modules/footer/subcribe.php");
		?>
		<!--end  subscribe -->
		<!-- footer -->
		<?php
		include_once("modules/footer/footer.php");
		?>
		<!--end  footer -->
	</div>


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

</body>

</html>