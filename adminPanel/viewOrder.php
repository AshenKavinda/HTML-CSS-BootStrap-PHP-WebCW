<?php
session_start();
require_once("../classes/Order.class.php");
$order = new Order ;
$oid = $_GET['oid'];

$orderRow = $order->getOrderDetailsByOID($oid);
$productTable = $order->getOrderProductByOID($oid);

function printAllProduct($productTable) {
    while($row =mysqli_fetch_row($productTable))
    {
        echo "
            <tr> 
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
            </tr> 
        " ;
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="overflow: scroll;">
    <div class="container mt-5 p-5 w-100 ">
      <?php if(isset($_GET['complete'])) : ?>
        <a href="index1.php?panel=3" style="text-decoration: none; color:aliceblue;"><button class="btn btn-primary px-4">Back</button></a> 
      
      <?php else : ?>
        <a href="index1.php?panel=2" style="text-decoration: none; color:aliceblue;"><button class="btn btn-primary px-4">Back</button></a> 

      <?php endif ; ?>

      <div class="d-flex flex-column">
        <h1>Order Details</h1>
      </div>
      <div class="d-flex flex-column w-100 p-5" style="font-size: 1.5vw;">
        <div class="d-flex flex-row w-100 gap-5">
          <div class="d-flex flex-column">
            <div>
              <label for="" >Order ID : </label>
              <label for="" ><?=$orderRow[0] ?></label>
            </div>
            <div>
              <label for="" >Price : </label>
              <label for="" ><?=$orderRow[1] ?></label>
            </div>
            <div>
              <label for="" >Date : </label>
              <label for="" ><?=$orderRow[2] ?></label>
            </div>

          </div>
          <div>
            <div>
              <label for="" >Customer Name :</label>
              <label for="" ><?=$orderRow[3] ?></label>
            </div>
            <div>
              <label for="" >Phone No :</label>
              <label for="" ><?=$orderRow[5] ?></label>
            </div>
            <div class="d-flex flex-row">
              <label for="" >Address :</label>
              <p  style="width: 30vw;"><?=$orderRow[4] ?></p>
            </div>
          </div>
          
        </div>
      </div>
      <div class="w-100 h-100 d-flex flex-column align-items-center position-relative overflow-hidden">
        <div class="w-75" style="max-height: 100%;object-fit: cover;">
            <div class="table-container">
                <table class="table bg-light position-relative w-100 mb-5">
                    <thead class="thead-dark">
                        <tr class="text-center">  
                            <th scope="col">Product Name</th>
                            <th scope="col">price</th>
                            <th scope="col">Quntity</th>
                        </tr>
                    </thead>
                    <tbody class="scrollable-tbody">
                         <?php printAllProduct($productTable) ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>