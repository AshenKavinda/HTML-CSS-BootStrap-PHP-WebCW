<?php
session_start();
require_once("../classes/Order.class.php");
$order = new Order ;


$total = $_POST['total'] ;
$name = $_POST['name'];
$address = $_POST['address'];
$pNo = $_POST['phone'];

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
            header("location: ../displayItems/productCard.php");
        }   
    }  
}



?>