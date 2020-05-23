<?php
  session_start();
  require_once("connect.php");

  if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log to order";
  header('location: login.php');
  } else { $_SESSION['msg'] = ""; }

  $_SESSION['page']="tickets";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Tickets - Cart</title>
</head>
<body>
<?php include "assets/header.php" ?>
    <div class="container my-5">
    <h1>Cart</h1>
    </div>
</body>
</html>