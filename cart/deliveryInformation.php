<?php
session_start();
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
  <body>
    <div class="container">
        <div class="mt-5 d-flex flex-row gap-4 m-3">
            <a href="cart.php" style="text-decoration: none;color:aliceblue;"><button class="btn btn-primary px-4 mt-2"><</button></a>        
            <h1>Delivery Information</h1>
        </div>
            
        </div>
        <form id="orderForm" action="addOrder.php" method="post">
            <div class=" my-4 d-flex flex-column gap-4 w-100 h-100 align-items-center">
                <div>
                    <label for="name" class="formlabel" style="color:white;">Name</label>
                    <input type="text" id="name" name="name" class="form-control" style="width:600px;">
                </div> 
                <div>
                    <label for="address" class="form-label" style="color:white;">Address</label>
                    <textarea style="height: 10vh; width:600px;" id="address" name="address" class="form-control"></textarea>
                </div>
                <div>
                    <label for="phone" class="form-label" style="color:white;">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-control" style="width:600px;">
                </div>
                <?php if(isset($_POST['total'])): ?>
                            <h3 style="color:white;background-color:#3a170d; border-radius:5px; width:250px; height:35px;    align-items: center;display: flex;justify-content: center;">Total : Rs. <?=$_POST['total']?>.00</h3>
                        <?php endif; ?> 
                </div> 
                <div class="container mt-5 w-100 mx-5">
                    <input type="hidden" name="total" value="<?=$_POST['total']?>">
                    <div class= "mx-5"> 
                        <div>  
   
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary ">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('orderForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const name = document.getElementById('name');
        const address = document.getElementById('address');
        const phone = document.getElementById('phone');

        if (name.value.trim() === '') {
            alert('Please enter your name.');
            name.focus();
            return false;
        }
        if (address.value.trim() === '') {
            alert('Please enter your address.');
            address.focus();
            return false;
        }
        if (phone.value.trim() === '') {
            alert('Please enter your phone number.');
            phone.focus();
            return false;
        }

        this.removeEventListener('submit', arguments.callee);
        this.submit();
    });
    </script>
</body>
</html>