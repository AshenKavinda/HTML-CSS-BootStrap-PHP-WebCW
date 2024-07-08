<?php 
session_start();
require_once("../classes/Order.class.php");
$order = new Order ;
$oid ;
if (isset($_GET["oid"])) {
    $oid = $_GET["oid"];
}
$order->undoOrderComplete($oid);
header("location: index1.php?panel=3");
?>