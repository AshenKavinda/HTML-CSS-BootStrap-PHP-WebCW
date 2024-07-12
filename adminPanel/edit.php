<?php
session_start();
require_once("../classes/product.class.php");
$product = new product ;
if (isset($_GET['id'])) {
    $code = $_GET["id"];
    $row = $product->getProductByCode($code);
    # code...
}

if (isset($_POST['code'])) {
    if ($_FILES['img']['name'] == null) {
        $result = $product->editProduct($_POST['code'],$_POST['name'],$_POST['price'],$_POST['stock'],$row[4]);
        if ($result) {
            header("location: formEdit.php?id=$code&true");
        }
    }else {
        if (file_exists("pImg/$row[4]")) {
            unlink("pImg/$row[4]");
        }
        
        $result = $product->editProduct($_POST['code'],$_POST['name'],$_POST['price'],$_POST['stock'],$_FILES['img']['name']);
        if ($result) {
            $temp = $_FILES['img']['tmp_name'];
            $path = 'pImg/'.$_FILES['img']['name'] ;
            move_uploaded_file($temp,$path);
        }
        if ($result) {
            header("location: formEdit.php?id=$code&true");
        }
        else {
            header("location: formEdit.php?id=$code&false");
        }
    }
    # code...
}

?>