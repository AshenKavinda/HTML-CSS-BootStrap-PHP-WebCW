<?php
session_start();
if(!isset($_SESSION['valid'])) {
  header("location: ../signIn/signIn.php");
  exit();
}
require_once("../classes/product.class.php");
$product = new product ;
$recordSuccess = 0 ;
if (isset($_GET['true'])) {
  $recordSuccess = 1 ;
}
if (isset($_GET['false'])) {
  $recordSuccess = 2 ;
}
$code = $_GET["id"];
$row = $product->getProductByCode($code);

if (isset($_POST['btnEdit'])) {
    if ($_FILES['img']['name'] == null) {
        $result = $product->editProduct($_POST['code'],$_POST['name'],$_POST['price'],$_POST['stock'],$row[4]);
        if ($result) {
            $recordSuccess = true ;
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
            $recordSuccess = true ;
        }
    } 
    $row = $product->getProductByCode($_GET["id"]);  
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        width: 100vw;
        height: 100vh;
        max-height: 100%;
        overflow: hidden;
      }
      h1{
        color:white;
      }
      .back{
        background-color:rgba(5, 5, 5, 0.8);
        border-radius:10px;
      }
      .form-label{
        color:white;
      }
      .btn-primary{
        background-color:white;
        color:black;
        border:none;
      }
      .btn-primary:hover{
        background-color:#322C2B;
      }
    </style>
  </head>
  <body style="overflow-y: scroll;">
    <section class="mt-5 w-100 h-100">
      <div class="container w-100 h-100">
        
        <div class="d-flex gap-3">
            <a href="index1.php?panel=1" style="text-decoration: none;color:aliceblue;"><button class="btn btn-primary px-4"><</button></a>
            <h1>EDIT ITEM</h1>
        </div>
        
        <?php if ($recordSuccess == 1): ?>
            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                <strong>Update Successfuly</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>

        <?php if ($recordSuccess == 2): ?>
            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                <strong>Update Unsuccessfuly</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>
        
       
  
        <form action="edit.php?id=<?=$code?>" method="post" enctype="multipart/form-data" class="mt-5 d-flex flex-column align-items-center">
          <div class="back d-md-flex flex-row gap-5 p-5">
            <div class="d-flex flex-column gap-3">
              <div>
                <label for="" class="form-label">Item Code</label>
                <input type="text" id="code" name="code" value="<?= $row[0] ?>" class="form-control" readonly>
              </div>
              <div>
                <label for="" class="form-label">Item name</label>
                <input type="text" id="name" name="name" value="<?= $row[1] ?>" class="form-control">
              </div>
              <div>
                <label for="" class="form-label">Item price</label>
                <input type="number" id="price" name="price" value="<?= $row[2] ?>" class="form-control">
              </div>
              <div>
                <label for="" class="form-label">Avilable</label>
                <div class="d-flex flex-row gap-3">
                  <div>
                    <input class="form-check-input" type="radio" name="stock" id="yes" value="1" <?= ($row[3] == 1) ? 'checked' : '' ?>>
                    <label class="form-label form-check-label" for="yes">
                      Yes
                    </label>
                  </div>
                  <div>
                    <input class="form-check-input" type="radio" name="stock" id="no" value="0" <?= ($row[3] == 0) ? 'checked' : '' ?>>
                    <label class="form-label form-check-label" for="no">
                      No
                    </label>
      
                  </div>
    
                </div>
                
              </div>
    
            </div>
    
            <div class="d-flex flex-column">
    
              <div class="mb-3">
                <label for="imageInput" class="form-label col-sm-2 col-form-label">Image</label>
                <div>
                  <input class="form-control col-9" type="file" id="imageInput" name="img" onchange="showImage(this)">
                </div>
              </div>
            
              <div class="d-flex flex-column w-100 h-100 align-items-center">
                <img src="../pimg/<?=$row[4]?>" name="image" id="imagePreview" class="" style="max-width: 250px;" alt="">
              </div>
              
            </div>
    
          </div>
    
          <div class="mt-2 d-flex w-50 gap-3 justify-content-end">
            <button type="submit" name="btnEdit" class="btn btn-primary px-3" >EDIT</button>
          </div>
  
        </form>
  
  
      </div>

    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      function showImage(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
      }

      document.getElementById('addItemForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var code = document.getElementById("code");
        var name = document.getElementById("name");
        var price = document.getElementById("price");
        var img = document.getElementById("imageInput");
        var stockYes = document.getElementById("yes");
        var stockNo = document.getElementById("no");

        if (code.value.trim() === "") {
            alert("Please enter the code.");
            code.focus();
            return false;
        }
        if (name.value.trim() === "") {
            alert("Please enter the name.");
            name.focus();
            return false;
        }
        if (price.value.trim() === "") {
            alert("Please enter the price.");
            price.focus();
            return false;
        }
        if (img.files.length === 0) {
            alert("Please select an image.");
            img.focus();
            return false;
        }
        if (!stockYes.checked && !stockNo.checked) {
            alert("Please select if the item is available.");
            return false;
        }
        this.removeEventListener('submit', arguments.callee);
        this.submit();
      }); 
      /*

      function validation() {
        var code = document.getElementsByName("code")[0].value;
        var name = document.getElementsByName("name")[0].value;
        var price = document.getElementsByName("price")[0].value;
        var img = document.getElementsByName("img")[0];
        
        var error = "" ;
        if (code.trim() === "") { 
            error += "Please fill in the code.\n";
        }
        if (name.trim() === "") { 
            error += "Please fill in the name.\n";
        }
        if (price.trim() === "") { 
            error += "Please fill in the price.\n";
        }

        if (error !== "" ) {
            alert(error);  
        }
        
      }*/

    </script>
  </body>
</html>