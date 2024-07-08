<?php
session_start();
require_once("../classes/product.class.php");
$product = new product ;
$code = $_GET['id'];
$product->deleteProduct($code);
header("location: index1.php");
?>