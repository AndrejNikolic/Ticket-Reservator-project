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
    <div class="container py-4">
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
        <div class="row">
            <div class="col-md-5 align-self-center">
                <h3>Login and Register</h3>
                <p>This website allows user to create his own account via registration form to order tickets. He can latter on log in and use that account to order new tickets.</p>
                <p>User can't order any tickets without loging in first.</p>
            </div>
            <div class="col-md-7">
                <img class="img-fluid home-image" src="img/login-register.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="conatainer-fluid bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img class="img-fluid" src="img/admin-01.png" alt="">
                </div>
                <div class="col-md-5 align-self-center">
                    <h3>Administrator</h3>
                    <p>There is a huge difference between user and administrator, which we will talk more about in the text bellow. 
                    <p>For now, we will just mention that there is administrator that allows you to use "Admin Panel" and "Add Concert" (for adding new concert, of course). Administrator can also <strong>delete</strong> and <strong>edit</strong> created concerts.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>