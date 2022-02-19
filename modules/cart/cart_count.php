<?php
if(isset($_SESSION['cart'])){
    $total = 0;
    foreach($_SESSION['cart'] as $qty){
        $total+=$qty;
    }
    echo $total;
}else{
    echo 0;
}
?>