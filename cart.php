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
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Concert</th>
                        <th scope="col">Tickets</th>
                        <th scope="col">Price</th>
                        <th scope="col">VIP</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>';

    for($i=0; $i<$max; $i++) {
    $image = base64_encode($_SESSION['cart'][$i]["Image"]);
    echo '<tr>
    <td><img src="data:image/jpeg;base64,'.$image.'" width="150"></td>
    <td>'.$_SESSION['cart'][$i]["Concert"].'</td>
    <td>'.$_SESSION['cart'][$i]["Tickets"].'</td>
    <td>$'.$_SESSION['cart'][$i]["Price"].'</td>
    <td>'.$_SESSION['cart'][$i]["VIP"].'</td>
    <td>$'.$_SESSION['cart'][$i]["Price VIP"].'</td>
    <td>$'.$_SESSION['cart'][$i]["Total"].'</td>
    </tr>';

    }

    echo '</tbody>
        </table>';

    ?>    
    <button type="button" onclick="<?php unset($_SESSION['cart']);?> window.location.reload();" class="btn btn-danger">Remove All</button>
    <?php
    } else {
        echo "Your cart is empty!";
    }
    ?>
    
    </div>
    
</body>
</html>