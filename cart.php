<?php
  session_start();
  require_once("connect.php");

  if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = '<h4 class="col-lg-4 col-md-6 offset-lg-4 offset-md-3 alert alert-warning text-center" role="alert">You must log in to order</h4>';
    header('location: login.php');
    } else { $_SESSION['error'] = ""; }

  $_SESSION['page']="tickets";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Tickets - Checkout</title>
</head>
<body>
<?php include "assets/header.php" ?>
    <div class="container my-5">
    <h1>Cart</h1>
    
    <?php if (isset($_SESSION['cart'])) {
    $max=sizeof($_SESSION['cart']);

    echo '<div class="table_overflow">
            <table class="table table-hover mt-2 text-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Concert</th>
                        <th scope="col">Address</th>
                        <th scope="col">ZIP</th>
                        <th scope="col">City</th>
                        <th scope="col">Country</th>
                        <th scope="col">Qty</th>
                        <th scope="col">VIP Qty</th>
                        <th scope="col">Fulfilled?</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>';

    for($i=0; $i<$max; $i++) {

    echo $_SESSION['cart'][$i]["Concert"];

    }

    echo '</tbody>
        </table>';
    } else {
                echo "Your cart is empty!";
    }
    ?>
    </div>
    
</body>
</html>