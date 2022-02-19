<?php
session_start();
define("SECURITY", True);
include_once("../config/connect.php");

if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    include_once("admin.php");
}else{
    include_once("login.php");
}
?>