<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
</head>
<body>
    <h1>Product Page</h1>
    <form method="post" action="add_to_cart.php">
        <input type="hidden" name="item_id" value="1">
        <input type="hidden" name="item_name" value="Sample Item">
        <input type="hidden" name="item_price" value="10.00">
        Quantity: <input type="number" name="item_quantity" value="1" min="1">
        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>
    <form method="post" action="add_to_cart.php">
        <input type="hidden" name="item_id" value="2">
        <input type="hidden" name="item_name" value="Sample Item 2">
        <input type="hidden" name="item_price" value="20.00">
        Quantity: <input type="number" name="item_quantity" value="1" min="1">
        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>
</body>
</html>