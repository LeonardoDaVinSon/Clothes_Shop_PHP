<?php
if(isset($_GET['qtt'])&&isset($_GET['prd_id'])){
    $qtt = $_GET['qtt'];
    $prd_id = $_GET['prd_id'];
}
if(isset($_SESSION['cart'])){
    $_SESSION['cart'][$prd_id] = $qtt;
    return "update";
}
?>