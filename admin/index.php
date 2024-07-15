<?php

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        width: 100vw;
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: absolute;
        background-image:url(../img/blurpro.jpg);
        background-size:cover;
    }
    .midPanel {
        box-shadow: -2px 4px 4px 0px rgba(0, 0, 0, 0.25);
        background-color:white;
        border-radius:10px;
    }
    .midpanelHedder {
        font-size: 40px;
        color:#3a170d;
        font-weight: 700;
    }
    .img{
        width:100px;
        height: 80px;
        border-radius:40px;
    }

    </style>
</head>
<body>
<div class="midPanel">
    <div class="position-relative overflow-hidden p-5">

        <div class="d-flex flex-column justify-content-center w-100 h-100 fontSizeSignIn">
        
        <form class="" action="validate.php" method="post">
            
            <div class="d-flex flex-column align-content-center justify-content-center gap-2">
             <div class="d-flex justify-content-center"><img class="img" src="../img/d5d36493419c82448c9529fc57adae25.jpg" alt=""></div>   

            <div class="text-center w-100" style="font-size: 3vw;font-weight: 500;">Welcome!</div>

            <div class="row">
                <label for="inputEmail3" class="col-form-label">Username</label>
                <div class="">
                <input name="username" type="text" class="form-control form-control-lg" id="inputEmail3"
                    placeholder="Email">
                </div>
            </div>
            
            <div class="row">
                <label for="inputPassword3" class="col-form-label">Password</label>
                <div class="">
                <input name="password" type="password" class="form-control form-control-lg" id="inputPassword3"
                    placeholder="Password">
                
                <?php if(isset($_GET['invalid'])) : ?>
                <span class="float-start text-decoration-none fontSizeSignIn mt-2" style="color: #e13030;">
                    Invalied username or password
                </span>
                <?php endif ; ?>
                </div>
            </div>

            <div class="mt-3">
                <button name="SigninSubmit" type="submit" class="btn w-100 py-2 fontSizeSignIn"
                style="background-color: #3a170d;font-weight: 700;color: #fff;">Sign in</button>
            </div>

            </div>
        </form>

        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>