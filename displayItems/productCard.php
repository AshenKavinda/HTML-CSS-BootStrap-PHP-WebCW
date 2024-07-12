<?php 

  //database connection
  require_once("../classes/product.class.php");

  $product = new product;

  $result = $product->getAllProduct();

  function printAll($resdata)
  {
    while ($row = mysqli_fetch_array($resdata)) {
      $id = $row[0];
      $image= $row[4] ;
      $name = $row[1] ;
      $price = $row[2] ;
      $stock = $row[3] ;
      $av = $stock == 1 ? "Available" : "Out of Stock"; 
      /*
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="item_id" value="2"> ok
        <input type="hidden" name="item_name" value="Sample Item 2"> ok
        <input type="hidden" name="item_price" value="20.00"> ok
        Quantity: <input type="number" name="item_quantity" value="1" min="1">
        <button type="submit" name="add_to_cart">Add to Cart</button>
      </form>*/

      echo "

      <div class='col-md-3'>
        <form method=\"post\" action=\"../cart/addToCart.php\">
          <input type=hidden name='item_id' value='$id'> 
          <input type='hidden'name='item_name' value='$name'>
          <input type='hidden' name='item_price' value='$price'>
          <div class='m-2'>
            <div class='card shadow card-bg '>
              <img class='card-img-top' src=../adminPanel/pImg/$image >

              <div class='card-body d-flex flex-column my-2 gap-3'>
              <div>
                <h5 class='card-title'>$name</h5>
                <span class='badge badge-success'>Rs.$price.00</span>

                <span class='badge ".($av == 'Available' ? 'badge-available' : 'badge-outofstock')."' style='margin-left: 20px;'>$av</span>
              </div>

                <div class='w-100 d-flex justify-content-end' >
                  <div style='badge'>
                    Quantity <input type='number' id='quantity' name = 'item_quantity' value='1' min='1' style='width:35px; border:none; border-radius:5px;'>
                  </div>
                </div>
                <button class='btn btn-primary ".($stock == 0 ? 'disabled' : '')."' type='submit' name='add_to_cart'>Add to Cart</button>
                </div>
            </div>
          </div>
        </form>
      </div>   
      ";
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chocolate</title>
    <style>
    </style>

    <link rel="stylesheet" href="productStyles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-light" style="background-color: #3a170d;">
    <div class="container-fluid">
      <a id="logoimg" class="navbar-brand" href="#"><img src="d5d36493419c82448c9529fc57adae25.jpg" alt="Coco Loco" width="100" height="50"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fa-solid fa-bars" style="color: white; font-size: 23px;"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../frontEndMain/mainMenu.php" style="color: #F6EDCE;">Home</a>
          </li>          
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav> 
    <br>
  
    <div class="container">
    <div class="mt-3">
    <div class="row">
      <?php
          printAll($result);
      ?>
      </div>
    </div>      
      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>