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
        <ul>
            <li>Login and register</li>
            <li>User and admin</li>
            <li>Search page</li>
            <li>Custom number inputs for tickets</li>
            <li>Admin panel</li>
            <li>Admin can See orders</li>
            <li>Admin can fulfill and delete orders</li>
            <li>Admin can Add new concerts</li>
            <li>Admin can Promote, demote and delete users</li>
            <li>Edit your profile</li>
            <li>Admin can edit and delete concerts</li>
            <li>can't enter after date ends</li>
            <li>tickets left counter and can't order on 0 tickets left - sold out</li>
            <li>Cart with checkout</li>
            <li>Thank you page with order details</li>
            <li>Responsive</li>
        </ul>
    </div>
</body>
</html>