<?php 
$prd_id = $_GET['prd_id'];
session_start();
define("SECURITY",true);
include_once("../../../config/connect.php");
if(isset($_SESSION['email'])&&isset($_SESSION['password'])){

    mysqli_query($conn,"DELETE FROM products WHERE prd_id = $prd_id");
    header("location: ../../index.php?page_layout=product");
}else{
    header("location: ../../index.php");
}