<?php
require_once("../classes/product.class.php");
$product = new product ;
    $result = $product->addProduct($_POST['code'],$_POST['name'],$_POST['price'],$_POST['stock'],$_FILES['img']['name']);
    if ($result) {
        $temp = $_FILES['img']['tmp_name'];
        $path = 'pImg/'.$_FILES['img']['name'] ;
        move_uploaded_file($temp,$path);
    }
    if ($result) {
        header("location: formAdd.php?true");
    }else {
        header("location: formAdd.php?false");
    }
?>