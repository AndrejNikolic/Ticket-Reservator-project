<?php
  session_start();
  require_once("connect.php");

  $_SESSION['page']="index";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Ticket Reservator - Welcome</title>
</head>
<body>
<?php include "assets/header.php" ?>
    <div class="container my-5">
        <h1>Homepage</h1>
        <p>Here you need to add slider and full description and options of Ticket Reservator</p>
    </div>
</body>
</html>