<?php

include '../Controller/CustomerC.php';

$error = "";

// create customer
$customer = null;

// create an instance of the controller
$customerC = new CustomerC();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["email"])&&
    isset($_POST["username"])&&
    isset($_POST["address"]) &&
    isset($_POST["dob"]) &&
    isset($_POST["pwd"])
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["username"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["dob"]) &&
        !empty($_POST["pwd"])
    ) {
        $customer = new Customer(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['username'],
            $_POST['email'],
            $_POST['address'],
            new DateTime($_POST['dob']),
            md5($_POST['pwd'])
        );
        $customerC->addCustomer($customer);
        // header('Location:ListCustomers.php');
        header('Location:login.php');
    } else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
      body{
background-image:url(../header-bg1.jpg);
background-size: 1600px;


        }
  
    </style>
    <title> Sign-Up</title>
</head>
<body>


<div class="container">
    <form id="form" class="form" autocomplete="off" method="POST"  style="z-index: 1; left: -3px; top: 202px; position: absolute; height: 132px; width: 494px">
        <pre><h2 id="formName">         Sign-Up  </h2></pre>
        <div class="form-control">
            <input type="text"  name="firstName" id="firstName" placeholder="First Name">
            <small>Error message</small>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
            <small>Error message</small>
            <input type="text" name="username" id="username" placeholder="Username">
            <small>Error message</small>
            <input type="text" name="email" id="email" placeholder="E-mail">
            <small>Error message</small>
            <input type="text" name="address" id="address" placeholder="Adress">
            <small>Error message</small>
            <input type="date" name="dob" id="dob" placeholder="Date of Birth">
            <small>Error message</small>
        </div>
        <div class="form-control">
            <input type="password" name="pwd" id="pwd" placeholder="Password">
            <small>Error message</small>
            <input type="password" name="pwd" id="pwd" placeholder="Confirm Password">
            <small>Error message</small>
        </div>
        <button type="submit">Submit</button>
        <a href="login.php">Login if you have an account</a>
        <a href="../../chatbot/bot.php"></a>
    </form>
</div>

    <!-- <script src="views/app.js"></script> -->
</body>
</html>