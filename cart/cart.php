<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url(../adminPanel/blurpro.jpg); background-size:cover;">
    <div class="container mt-5">
        <div class="mb5 d-flex flex-row gap-4 m-3">
            <a href="../displayItems/productCard.php" style="text-decoration: none;color:aliceblue;"><button class="btn btn-primary px-4 mt-2"><</button></a>        
            <h1>Shopping Cart</h1>
        </div>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <div class="w-100 h-100 d-flex flex-column align-items-center position-relative overflow-hidden">
                <div class="w-75" style="max-height: 100%;object-fit: cover;">
                    <div class="table-container">
                        <table class="table bg-light position-relative w-100 mb-5">
                            <thead class="thead-dark">
                                <tr class="text-center">  
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quntity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Control</th>
                                </tr>
                            </thead>
                            <tbody class="scrollable-tbody">
                            <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                                <tr class="text-center">
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['price']; ?></td>
                                    <form method="post" action="updateCart.php">
                                    <td><input style="width: 4rem;" type="number" name="item_quantity" value="<?php echo $item['quantity']; ?>" min="1"></td>
                                    <td><?php echo $item['price'] * $item['quantity']; ?></td>
                                    <td class="w-100 d-flex flex-row gap-1 justify-content-center"> 
                                        <div>
                                            <input type="hidden" name="item_index" value="<?php echo $index; ?>">                                    
                                            <button class="btnUpdate" type="submit" name="update_quantity"></button>
                                            </form>
                                        </div>
                                        
                                        <form method="post" action="removeFromCart.php">
                                            <input type="hidden" name="item_index" value="<?php echo $index; ?>">
                                            <button class="btnDelete" type="submit" name="remove_item"></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <form action="deliveryInformation.php" method="post">
                <?php
                    $total = 0 ;
                    foreach ($_SESSION['cart'] as $index => $item) {
                        $total += $item['price'] * $item['quantity'];
                    }
                ?>
                <div class="d-flex flex-row gap-4 aligns-items-center px-5">
                    <h2 class="head">Total = <?php echo "Rs.".$total.".00" ?></h2>
                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    <button type="submit" class="btn btn-primary ms-auto">Place Order</button>
                </div>     
            </form>

            
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


