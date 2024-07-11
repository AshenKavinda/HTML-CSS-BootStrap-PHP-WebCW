<?php
session_start();

if (isset($_POST['update_quantity'])) {
    $item_index = $_POST['item_index'];
    $item_quantity = $_POST['item_quantity'];

    if (isset($_SESSION['cart'][$item_index])) {
        $_SESSION['cart'][$item_index]['quantity'] = $item_quantity;
    }

    header("Location: cart.php");
    exit();
}
?>
