<?php
session_start();

if (isset($_POST['remove_item'])) {
    $item_index = $_POST['item_index'];

    if (isset($_SESSION['cart'][$item_index])) {
        unset($_SESSION['cart'][$item_index]);
    }

    header("Location: cart.php");
    exit();
}
?>
