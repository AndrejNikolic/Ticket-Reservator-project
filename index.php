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
<main>
    <div class="container py-5">
        <h1>Homepage</h1>
        <p>Here you need to add slider and full description and options of Ticket Reservator</p>
        <ul>
            
            <li>Admin panel</li>
            <li>Admin can See orders</li>
            <li>Admin can fulfill and delete orders</li>
            <li>Admin can Add new concerts</li>
            <li>Admin can Promote, demote and delete users</li>
            <li>Edit your profile</li>
            <li>Admin can edit and delete concerts</li>
            <li>can't enter after date ends</li>
            <li>tickets left counter and can't order on 0 tickets left - sold out</li>
            <li>Custom number inputs for tickets</li>
            <li>Cart with checkout</li>
            <li>Thank you page with order details</li>
            <li>Responsive</li>
        </ul>
        <div class="row">
            <div class="col-md-4 align-self-center">
                <h3>Login and Register</h3>
                <p>This website allows user to <b>create his own account</b> via registration form to order tickets. He can latter on log in and use that account to order new tickets.</p>
                <p>User <b>can't order any tickets</b> without loging in first.</p>
            </div>
            <div class="col-md-8">
                <img class="img-fluid home-image" src="img/login-register.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="conatainer-fluid bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-7">
                    <img class="img-fluid" src="img/admin-01.png" alt="">
                </div>
                <div class="col-md-5 align-self-center">
                    <h3>Administrator</h3>
                    <p>There is a huge difference between user and administrator, which we will talk more about in the text bellow. 
                    <p>For now, I will just mention that there is administrator that allows you to use <b>"Admin Panel"</b> and <b>"Add Concert"</b> (for adding new concert, of course). Administrator can also <strong>delete</strong> and <strong>edit</strong> created concerts.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
    <div class="row">
        <div class="col-md-4 align-self-center">
            <h3>Custom Search Page</h3>
            <p>Created custom search page that searches:
            <ul>
                <li>Date</li>
                <li>Title and</li>
                <li>Description</li>
            </ul>
            of concerts.
            </p>
            
        </div>
        <div class="col-md-8">
            <img class="img-fluid home-image" src="img/custom-search.jpg" alt="">
        </div>
        </div>
    </div>
    <div class="conatainer-fluid bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid" src="img/tickets-01.png" alt="">
                </div>
                <div class="col-md-4 align-self-center">
                    <h3>Concert Page</h3>
                    <p>This page have:
                        <ul>
                            <li>Classic and VIP Tickets</li>
                            <li>Custom +/- fields for tickets</li>
                            <li>How many tickets are left</li>
                            <li><b>SOLD OUT</b> if there are 0 tickets left</li>
                        </ul>
                    </p>
                    <p>Also, user <b>can't go bellow 0</b> tickets and <b>above maximum</b> number of tickets that we setted up when concert was created. 
                        Both input and buttons are <b>disabled</b> when ticket number is 0.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
    <div class="row">
        <div class="col-md-4 align-self-center">
            <h3>Cart and Checkout</h3>
            <p><b>Interactive chart button</b> in header that shows how many products are in cart</p>
            <p>Cart shows complete list of added concerts, tickets, their prices, subtotal and total price of all tickets.</p>
            <p>Cart includes <b>"Remove All"</b> button and input fields for <b>checkout</b> and adding tickets to order:
            <ul>
                <li>Address</li>
                <li>City</li>
                <li>Zip (Postal Code) and</li>
                <li>Country</li>
            </ul>
            </p>
            
        </div>
        <div class="col-md-8">
            <img class="img-fluid home-image" src="img/cart-01.png" alt="">
        </div>
        </div>
    </div>
    <div class="conatainer-fluid bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-7">
                    <img class="img-fluid" src="img/admin-02.png" alt="">
                </div>
                <div class="col-md-5 align-self-center">
                    <h3>Admin Panel</h3>
                    <p>Admin panel allows administrator to <b>see</b>, <b>delete</b> and <b>fulfill orders</b> when tickets are sent to customer.</p>
                    <p>In admin menu he can also:
                        <ul>
                            <li>Add new concert</li>
                            <li>See all users</li>
                            <li>Delete users</li>
                            <li><b>Promote/Demote</b> users to/from administrator</li>
                            <li>Edit his own account</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "assets/footer.php" ?>
</body>
</html>