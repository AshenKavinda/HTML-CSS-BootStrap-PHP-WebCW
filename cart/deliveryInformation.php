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
  </head>
  <body>
    <div class="container">
        <div class="mt-5">
            <a href="cart.php" style="text-decoration: none;color:aliceblue;"><button class="btn btn-primary px-4">Back</button></a>        
            <h1>Dilivery Information</h1>
            <?php if(isset($_POST['total'])): ?>
                <h3>Total : <?=$_POST['total']?></h3>
            <?php endif; ?>    

        </div>
        <form id="orderForm" action="" method="post">
            <div class="mx-5 px-5 my-5 py-5 d-flex flex-column gap-4">
                <div>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div> 
                <div>
                    <label for="address" class="form-label">Address</label>
                    <textarea style="height: 10vh;" id="address" name="address" class="form-control"></textarea>
                </div>
                <div>
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-control">
                </div>
                <div class="mt-5 w-100">
                    <button style="float: right;" type="submit" class="btn btn-primary">Place Order</button>
                </div>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('orderForm').addEventListener('submit', function(event) {
        // Prevent the form from submitting
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

        // If all fields are valid, submit the form
        this.submit();
    });
    </script>
</body>
</html>