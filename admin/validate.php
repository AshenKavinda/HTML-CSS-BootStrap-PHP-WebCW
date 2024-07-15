<?php
session_start(); 
require_once("../classes/SignIn.class.php");
$signIn = new SignIn ;

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $signIn->isValied($username,$password);
    if ($result) {
        $_SESSION['valid'] = true;
        header("location: ../adminPanel/index1.php");
    }
    else {
        header("location: index.php?invalid");
    }
}
?>