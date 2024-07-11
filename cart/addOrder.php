<?php
session_start();
require_once("../classes/Order.class.php");
$order = new Order ;


$total = 200 ;
$name = "kavinda";
$address = "matara";
$pNo = 4445456;

$oid = $order->addOrder($total,$name,$address,$pNo);
if ($oid != null) {
    if (isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $index => $item) {
            $id = $item['id'];
            $name = $item['name'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            
            $result = $order->addItemsToOrder($oid,$id,$quantity);
            if ($result) {
                unset($_SESSION['cart']);
            }
            header("location: cart.php");
        }   
    }  
}



?>