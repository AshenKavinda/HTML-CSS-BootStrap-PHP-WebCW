<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_quantity = $_POST['item_quantity'];

    $cart_item = array(
        'id' => $item_id,
        'name' => $item_name,
        'price' => $item_price,
        'quantity' => $item_quantity
    );
    $existItem = false;
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    } else { 
        foreach ($_SESSION['cart'] as $index => &$item) {
            if ($item['id'] == $item_id) {
                $item['quantity'] += $item_quantity;
                $existItem = true;
                break;
            }
        }  
    }
    if ($existItem == false) {
        $_SESSION['cart'][] = $cart_item;
    }
    header("Location: cart.php");
    exit();
}
?>
