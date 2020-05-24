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
        <div class="cart-header">
            <h1>Tickets</h1>
            <?php if (isset($_SESSION['cart'])) : ?>
            <button type="button" onclick="window.location.href='cart.php?clear=yes'" class="btn btn-danger">Remove All</button>
            <?php 
                if (@$_REQUEST["clear"]=="yes")
                {
                    unset($_SESSION['cart']);
                    header('Location: '.$_SERVER['PHP_SELF']);
                }
            ?>
            <?php endif ?>
        </div>
    <?php if (isset($_SESSION['cart'])) {

    $max = sizeof($_SESSION['cart']);
    $total = 0;

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
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>';

    for($i=0; $i<$max; $i++) {
    $image = base64_encode($_SESSION['cart'][$i]["Image"]);
    $total = $total + $_SESSION['cart'][$i]["Total"];
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

    echo '<tr class="total-price"><th colspan="6" class="text-right">Total:</th><th>$'.$total.'</th></tr></tbody>
        </table>';

    $address = $city = $zip = $country = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_SESSION['username_id'];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $zip = $_POST["zip"];
        $country = $_POST["country"];


        for($i=0; $i<$max; $i++) {
            $id_concert = $_SESSION['cart'][$i]["ConcertID"];
            $quantity = $_SESSION['cart'][$i]["Tickets"];
            $quantity_vip = $_SESSION['cart'][$i]["VIP"];
            $sql = "INSERT INTO ticket (id_concert, id_user, address, zip, city, country, quantity, quantity_vip) VALUES ('$id_concert', '$user', '$address', '$zip', '$city', '$country', '$quantity', '$quantity_vip')";
            
            if (mysqli_query($con, $sql)) {
               echo "Thank you for your order";
            } else {
                echo "Error: " . mysqli_error($con);
            }
            
        }
        //header("location: index.php");
    }

    ?>    
    <h3 class="text-center mt-5">Deliver tickets to:</h3>
    <div class="row justify-content-center">
    <form class="col-md-5" action="" method="post">
    <div class="form-group">
        <label for="address">Address: <span class="red">*</span></label>
        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" required>
    </div>
    <div class="form-row">
        <div class="col mb-3">
            <label for="city">City: <span class="red">*</span></label>
            <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" required>
        </div>
        <div class="col">
            <label for="zip">Zip: <span class="red">*</span></label>
            <input type="text" class="form-control" name="zip" value="<?php echo $zip; ?>" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="country">Country: <span class="red">*</span></label>
            <input type="text" class="form-control" name="country" value="<?php echo $country; ?>" required>
        </div>
    </div>
    <input class="btn btn-primary btn-block" type="submit" value="ORDER TICKETS" name="order_tickets"/>
    </form>
    </div>
    
    <?php
    } else {
        echo "Your cart is empty!";
    }
    ?>
    
    </div>
    
</body>
</html>