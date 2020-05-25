<?php
session_start();
require_once("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Thank you</title>
</head>
<body>
    <?php include "assets/header.php" ?>
<main>
    <div class="container my-5">
        
        <?php
        if (isset($_POST["address"])) { ?>

        <div class="row justify-content-center my-2">
            <div class="col-md-8 alert alert-success text-center" role="alert">
            <h4><?php echo $_SESSION['username']; ?>, thank you for your order!</h4>
                We've recived your order and we will ship your package as soon as possible.
            </div>
        </div>
        <?php    

            echo '<div class="row justify-content-center my-2">
                    <div class="col-md-5 alert alert-info text-center" role="alert">
                    Your tickets: <br>';            

            $max = sizeof($_SESSION['cart']);
            $total = 0;

            $user = $_SESSION['username_id'];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $zip = $_POST["zip"];
            $country = $_POST["country"];


            for($i=0; $i<$max; $i++) {
                $total = $total + $_SESSION['cart'][$i]["Total"];
                $id_concert = $_SESSION['cart'][$i]["ConcertID"];
                $quantity = $_SESSION['cart'][$i]["Tickets"];
                $quantity_vip = $_SESSION['cart'][$i]["VIP"];
                $sql = "INSERT INTO ticket (id_concert, id_user, address, zip, city, country, quantity, quantity_vip) VALUES ('$id_concert', '$user', '$address', '$zip', '$city', '$country', '$quantity', '$quantity_vip')";
                    
                if (mysqli_query($con, $sql)) {
                    echo $_SESSION['cart'][$i]["Concert"].' / '.$_SESSION['cart'][$i]["Tickets"].' x Ticket / '.$_SESSION['cart'][$i]["VIP"].' x VIP<br>';
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            }

            echo 'with total price of $'.$total.'<br>
                </div>
            </div>
            <div class="row justify-content-center my-2">
                <div class="col-md-3 alert alert-info text-center" role="alert">
                    Shipping addres:<br>'.$address.'<br>'.$zip.' '.$city.'<br>'.$country.'</div>';

            unset($_SESSION['cart']);
        } else {
            header("location: concerts.php");
        }
        ?>

        </div>

    </div>
    
</main>
<?php include "assets/footer.php" ?>
</body>
</html>