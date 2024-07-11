<?php
session_start();
if (!isset($_SESSION['valied'])) {
  header("location: ../signIn/signIn.php?ttt");
  exit();
}
require_once("../classes/product.class.php");
require_once("../classes/Order.class.php");
$product = new product ;
$order = new Order ;

function printProductTable($product)
{
  $result = $product->getAllProduct();
  while ($row = mysqli_fetch_row($result)) {
    echo "
          <tr>
              <td>$row[0]</td>
              <td>$row[1]</td>
              <td>$row[2]</td>
              <td>$row[3]</td>
              <td>$row[4]</td>
              <td>
                  <a href=\"formEdit.php?id=$row[0]\"><button class='btnEdit'></button></a>
                  <a href=\"delete.php?id=$row[0]\"><button  class='btnDelete'></button></a>
                  
              </td>
          </tr> 
          ";
  }
  
}

function printPendingOrders($order)
{
  $result = $order->getPendingOrders();
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_row($result)) {
      echo "
            <tr>
                <td>$row[0]</td>
                <td>$row[2]</td>
                <td>$row[1]</td>
                <td>
                    <a href=\"viewOrder.php?oid=$row[0]\"><button href style=\"background-color: green;color: aliceblue;\">View</button></a>
                    <a href=\"moveToComplete.php?oid=$row[0]\"><button style=\"background-color: rgb(128, 0, 0);color: aliceblue;\">Done</button></a>
                </td>
            </tr> 
            ";
    }
  }
}

function printCompletedOrders($order)
{
  $result = $order->getCompletedOrders();
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_row($result)) {
      echo "
            <tr>
                <td>$row[0]</td>
                <td>$row[2]</td>
                <td>$row[1]</td>
                <td>
                    <a href=\"viewOrder.php?oid=$row[0]&complete\"><button href style=\"background-color: green;color: aliceblue;\">View</button></a>
                    <a href=\"moveToPending.php?oid=$row[0]\"><button style=\"background-color: rgb(128, 0, 0);color: aliceblue;\">Undo</button></a>
                </td>
            </tr> 
            ";
    }
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
    <style>
      .btnEdit{
        background-color: white !important;
        background-image:url(../cart/changes.png);
        background-size:cover;
        color: aliceblue !important;
        border:none !important;
        height: 25px !important;
        width: 25px !important;
      }
      .btnDelete{
        background-color: white !important;
        background-image:url(../cart/bin.png);
        background-size:cover;
        color: aliceblue !important;
        border:none !important;
        height: 25px !important;
        width: 25px !important;
      }
      .btnEdit:hover{
        background-color:green !important;
        border-radius:5px !important;
      }
      .btnDelete:hover{
        background-color:red !important;
        border-radius:5px !important;
      }
    </style>

  </head>
  <body>
    <div class="d-flex flex-row w-100 h-100">
      <div class="leftPanel">
        <div class="leftPanelContent w-100 h-100 overflow-hidden position-relative">
            <div class="w-100 position-absolute py-3 bottom-0" style="height: 80%;">
              <div class="w-100 overflow-hidden position-relative" style="height: 100%;">
                <div class="btnLink" style="cursor: pointer;" onclick="itemSection()">
                  <div class="w-100 h-100 d-flex flex-column px-4 justify-content-center">
                    <span>Products</span>
                  </div>
                </div>

                <div class="btnLink" style="cursor: pointer;" onclick="pendingOrderSection()">
                  <div class="w-100 h-100 d-flex flex-column px-4 justify-content-center">
                    <span>Pending Orders</span>
                  </div>
                </div>

                <div class="btnLink" style="cursor: pointer;" onclick="completedOrderSection()">
                  <div class="w-100 h-100 d-flex flex-column px-4 justify-content-center">
                    <span>completed Orders</span>
                  </div>
                </div>

                <div class="d-flex flex-column justify-content-end w-100 object-fit-cover position-absolute bottom-0" style="max-height: 100%;">
                  <form action="../signIn/logOut.php" method="post">
                    <button type="submit">log-out</button>
                  </form>
                </div>
                
              </div>

            </div>
          </div>
      </div>


      <div class="midPanel p-3" style="padding-left: 0 !important;">
        
        <div class="w-100 h-100 p-5" id="midPanel" style="border-radius: 0 2rem 2rem 0; background-color: #C7C7C7;">
          
          <?php if (!isset($_GET["panel"])) : ?>
            <div class="d-flex flex-column w-100 h-100">
                <div class="mb-4">
                    <button class="btn btn-primary px-4"><a href="formAdd.php" style="text-decoration: none;color:aliceblue;">Add New</a></button>
                </div>
                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden">
                    <div class="w-100 h-100" style="max-height: 100%;object-fit: cover;">
                        <div class="table-container">
                            <table class="table bg-light position-relative w-100 mb-5">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Item Code</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Item Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Control</th>
                                    </tr>
                                </thead>
                                <tbody class="scrollable-tbody">
                                    <?php printProductTable($product); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          <?php endif; ?>

          <?php if (isset($_GET["panel"])) : ?>
            <?php if ($_GET["panel"]==1) : ?>
              <div class="d-flex flex-column w-100 h-100">
                  <div class="mb-4">
                      <button class="btn btn-primary px-4"><a href="formAdd.php" style="text-decoration: none;color:aliceblue;">Add New</a></button>
                  </div>
                  <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden">
                      <div class="w-100 h-100" style="max-height: 100%;object-fit: cover;">
                          <div class="table-container">
                              <table class="table bg-light position-relative w-100 mb-5">
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col">Item Code</th>
                                          <th scope="col">Item Name</th>
                                          <th scope="col">Item Price</th>
                                          <th scope="col">Stock</th>
                                          <th scope="col">Image</th>
                                          <th scope="col">Control</th>
                                      </tr>
                                  </thead>
                                  <tbody class="scrollable-tbody">
                                      <?php printProductTable($product); ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
            <?php endif; ?>
            
            <?php if ($_GET["panel"]==2 ) : ?>
            <div class="d-flex flex-column w-100 h-100">
              <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden">
                <div class="w-100" style="max-height: 100%;object-fit: cover;">
                  <div class="table-container">
                    <table class="table bg-light position-relative w-100 mb-5">
                      <thead class="thead-dark">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Control</th>
                        </tr>
                      </thead>
                      <tbody class="scrollable-tbody">
                        <?php printPendingOrders($order); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?> 

            <?php if ($_GET["panel"]==3 ) : ?>
            <div class="d-flex flex-column w-100 h-100">
              <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden">
                <div class="w-100" style="max-height: 100%;object-fit: cover;">
                  <div class="table-container">
                    <table class="table bg-light position-relative w-100 mb-5">
                      <thead class="thead-dark">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Control</th>
                        </tr>
                      </thead>
                      <tbody class="scrollable-tbody">
                        <?php printCompletedOrders($order); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?> 

          <?php endif; ?>


          

          
        </div>

      </div>

      <div class="headPanel p-3">
        <div class="w-100 h-100" style="border-radius: 2rem; background-color: #C7C7C7;">

        </div>

      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      function itemSection() {
        var midpanel = document.getElementById("midPanel");
        midpanel.innerHTML = `
        <div class="d-flex flex-column w-100 h-100">
            <div class="mb-4">
                <button class="btn btn-primary px-4"><a href="formAdd.php" style="text-decoration: none;color:aliceblue;">Add New</a></button>
            </div>
            <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden">
                <div class="w-100 h-100" style="max-height: 100%;object-fit: cover;">
                    <div class="table-container">
                        <table class="table bg-light position-relative w-100 mb-5">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Item Code</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Control</th>
                                </tr>
                            </thead>
                            <tbody class="scrollable-tbody">
                                <?php printProductTable($product); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        `;
      }
      
      function completedOrderSection() {
        var midpanel = document.getElementById("midPanel");
        midpanel.innerHTML = `
          <div class="d-flex flex-column w-100 h-100">
            <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden">
              <div class="w-100" style="max-height: 100%;object-fit: cover;">
                <div class="table-container">
                  <table class="table bg-light position-relative w-100 mb-5">
                    <thead class="thead-dark">
                      <tr>
                          <th scope="col">Order ID</th>
                          <th scope="col">Date</th>
                          <th scope="col">Price</th>
                          <th scope="col">Control</th>
                      </tr>
                    </thead>
                    <tbody class="scrollable-tbody">
                      <?php printCompletedOrders($order); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        `;
      }

      function pendingOrderSection() {
        var midpanel = document.getElementById("midPanel");
        midpanel.innerHTML = `
          <div class="d-flex flex-column w-100 h-100">
            <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden">
              <div class="w-100" style="max-height: 100%;object-fit: cover;">
                <div class="table-container">
                  <table class="table bg-light position-relative w-100 mb-5">
                    <thead class="thead-dark">
                      <tr>
                          <th scope="col">Order ID</th>
                          <th scope="col">Date</th>
                          <th scope="col">Price</th>
                          <th scope="col">Control</th>
                      </tr>
                    </thead>
                    <tbody class="scrollable-tbody">
                      <?php printPendingOrders($order); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        `;
      }
    </script>
  </body>
</html>