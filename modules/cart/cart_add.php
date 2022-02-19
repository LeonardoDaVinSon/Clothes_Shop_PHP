<?php
session_start();
$prd_id = $_GET['prd_id'];
if(isset($_GET['qtt'])){
    $qtt = $_GET['qtt'];
}else{
    $qtt = 1;
}
if(isset($_SESSION['cart'][$prd_id])){
    $_SESSION['cart'][$prd_id] += $qtt;
}else{
    $_SESSION['cart'][$prd_id] = $qtt;
}
header("location: ../../index.php?page_layout=cart");

?>