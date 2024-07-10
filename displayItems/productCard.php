<?php 
<<<<<<< HEAD
  //database connection
  require_once("../classes/product.class.php");

  $product = new product;

  $result = $product->getAllProduct();
=======
  $conn = mysqli_connect("localhost","db123","12345678") ;

  mysqli_select_db($conn,"webDB");

  $query = "select * from itemstbl" ;
  $result = mysqli_query($conn,$query);
>>>>>>> parent of c18c7d7 (Revert "displayItemsInDataBase")

  function printAll($resdata)
  {
    while ($row = mysqli_fetch_array($resdata)) {
<<<<<<< HEAD
      $image= $row[4] ;
      $name = $row[1] ;
      $price = $row[2] ;
      $stock = $row[3] ;
=======
      $image= $row[3] ;
      $name = $row[1] ;
      $price = $row[2] ;
      $stock = $row[4] ;
>>>>>>> parent of c18c7d7 (Revert "displayItemsInDataBase")

      $av = "";

      if($stock > 0)
      {
        $av = "Available";
      }else{
        $av = "Out of Stock";
      }

      echo "<br>
            
      <div class='col-3'>
          <div class='m-2'>
            <div class='card shadow'>
<<<<<<< HEAD
              <img class='card-img-top' src=../adminPanel/pImg/$image >
=======
              <img class='card-img-top' src=$image >
>>>>>>> parent of c18c7d7 (Revert "displayItemsInDataBase")
              <div class='card-body'>
                <h5 class='card-title'>$name</h5>
                <span class='badge badge-success'>Rs.$price.00</span>";

                if($av == "Available")
                {
                    echo "<span class='badge badge-success' style = 'background-color:green; margin-left: 20px;'>$av</span>";
                }else if($av == "Out of Stock")
                {
                    echo "<span class='badge badge-success' style = 'background-color:red;margin-left: 20px;'>$av</span>";
                }

                echo "<br><br>
                <a href='#' class='btn btn-primary'>Add to Cart</a>
              </div>
            </div>
          </div>
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
<<<<<<< HEAD
    <link rel="stylesheet" href="productStyles.css">
=======
    <link rel="stylesheet" href="productStyles.Css">
>>>>>>> parent of c18c7d7 (Revert "displayItemsInDataBase")
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
            <a class="nav-link active" aria-current="page" href="#" style="color: #F6EDCE;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: #F6EDCE;">About Us</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link" style="color: #F6EDCE;" href="productCard.php" id="load-content-link">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: #F6EDCE;">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: #F6EDCE;">Contact Us</a>
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
      
      <div class="row">

        <?php
            printAll($result);
        ?>
 
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>