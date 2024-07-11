<?php 

  //database connection
  require_once("../classes/Order.class.php");

  $product = new Order;

  $result = $product->getBestSellingProduct();

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
        <form method=\"post\" action=\"../cart/add_to_cart.php\">
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="./Images/icon2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chocolaté</title>
    
    <link rel="stylesheet" href="style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet"> icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-TfGbD8Hmq3k4EZJc+YnCRxW4TepLQ0R9JZJKw8cyOsy/7UTBz5X1oBqHBBa/NKoo5reuhHkZnF1w5PmZ8EoH5Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

</head>
<body>
    
    

        <!-- nav-->

        <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a id="logoimg" class="navbar-brand" href="#"><img src="./Images/d5d36493419c82448c9529fc57adae25.jpg" alt="Coco Loco" width="100" height="50"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: white; font-size: 23px;"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#main">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#gallery">Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                  </li>                       
                </ul>
                <form class="d-flex">
                  <span class="input-group-text mx-2"><a><img src="./Images/shopping-cart.png"></a></span>
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>

        <!------------------>

        <!-- main page-->

          <section id="main">

            <div class="content">

                <h3>Fill Your Taste Buds with the<br> Taste of Our<br> Chocolate</h3>
                <p>In every bite of our chocolate, discover a symphony of flavors<br>
                   crafted to perfection, a testament to our passion for sweetness.</p>

                <button id="btnOrder">Place Order</button>

            </div>
          </section>
          <!-- main page-->

          <!-- About -->

          <section id="about">
            <div class="container">
              <div class="headingAbout">About <span>Us</span></div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <img src="./Images/About.jpg" alt="Chocolaté">
                  </div>
                </div>

                <div class="col-md-6">
                  <h3 class="text" >WHAT MAKES OUR CHOCOLATE SPECIAL</a></h3><br>
                  <p style="text-align: justify;">Premium Ingredients: We source the finest cocoa beans from sustainable farms around the world.
                     Our commitment to quality ensures that every piece of chocolate is made from the best raw materials, free from artificial additives and preservatives.

                    Artisanal Craftsmanship: Each piece of our chocolate is handcrafted by skilled artisans who pour their expertise and passion into every creation.
                     This dedication to the art of chocolate-making results in exquisite flavors and textures that stand out.
                        
                    Customer Satisfaction: Your satisfaction is our top priority. We take pride in our customer service, ensuring that every experience
                     with Chocolate is as delightful as our confections. Whether you're visiting our shop or ordering online, we strive to make your chocolate journey exceptional.</p><br><br>

                     <h3 class="chocoAboutUs">Chocolaté</h3>

                     
                </div>


              </div>

            </div>


          </section>
          <!-- About -->

          <!-- best sellers-->

          <section id="bestSelling">

            <div class="container p-5">

                <div class="headBest">Best<span> Sellers</span></div>

                <div class="row">

                    <?php

                     printAll($result);

                    ?>

                </div>  

            </div>

          </section>

          <!-- best sellers-->

          <!-- gallery-->

        <section id="gallery" class="w-100 h-100 ">
            <div class="container p-5" id="gallC">

              <div class="headingG"><span>Gallery </span></div>
  
              <div class="row" style="margin-top: 30px;">
  
                <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                    <img src="./Images/hand1.jpg" alt="hand made chocolate">
                  </div>
                </div>
  
                <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                    <img src="./Images/hand2.jpg" alt="hand made chocolate">
                  </div>
                </div>
  
                <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                    <img src="./Images/hand3.jpg" alt="hand made chocolate">
                  </div>
                </div>
  
              </div>
  
              <div class="row" style="margin-top: 30px;">
  
                <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                    <img src="./Images/hand4.jpg" alt="hand made chocolate">
                  </div>
                </div>
  
                <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                    <img src="./Images/hand5.jpg" alt="hand made chocolate">
                  </div>
                </div>
  
                <div class="col-md-4 py-3 py-md-0">
                  <div class="card">
                    <img src="./Images/hand6.webp" alt="hand made chocolate">
                  </div>
                </div>
  
              </div>

            </div>

        </section> 

        <!-- gallery-->

        <!-- contact us-->

        <section id="contact">
            <div class="container p-5">
                <form class="formC" action="https://api.web3forms.com/submit" method="POST">
                    <h3>Contact Us</h3>
                    <input type="hidden" name="access_key" value="598608aa-c0bb-4861-b9bb-d8215d4cd640">
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                    <input type="text" id="phone" name="phone" placeholder="Contact Number" required>
                    <textarea id="msg" name="message" rows="5" placeholder="How can we help you? Drop us a msg :D "></textarea><br>
                    <button type="submit">Send</button>
                </form>
            </div>
        </section>
        
        <!-- contact us-->

        <!-- footer-->
        <section id="footerr position-absolute">       
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Chocolaté</h4>
                                <p>A place where taste meets art.</p>
                                <p>Follow us:</p>
                                <div class="social-links">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <h4>Quick Links</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#main">Home</a></li>
                                    <li><a href="#about">About Us</a></li>
                                    <li><a href="#gallery">Gallery</a></li>
                                    <li><a href="#contact">Contact Us</a></li>
                                </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Contact Information</h4>
                            <p>123 Chocolate Street, City, Country</p>
                            <p>Email: info@chocolate.com</p>
                            <p>Phone: +123 456 7890</p>
                        </div>
                    </div>
                </div>
        </section>
        <!-- footer-->

    

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
