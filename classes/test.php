<?php 
require_once("Order.class.php");
$order = new Order ;

//$result = $order->addOrder(4000,"Kavinda","kalutara",045454545);
$result = $order->addItemsToOrder(2,1,1);
echo $result ;
$result2 = $order->addItemsToOrder(2,2,3);
echo $result2 ;
?>