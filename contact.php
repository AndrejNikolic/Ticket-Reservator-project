<?php
session_start();
require_once("connect.php");

$_SESSION['page']="contact";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Contact</title>
</head>
<body>
<?php include "assets/header.php" ?>
<main>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13360.96830126689!2d19.854437732431975!3d45.25188572252517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475b1077bfacf56b%3A0xa7ff4e0e190a1b33!2sPetrovaradin%20Fortress!5e0!3m2!1sen!2srs!4v1590312883500!5m2!1sen!2srs" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="container my-5">
        <h3>CONTACT</h3>
    </div>
</main>
<?php include "assets/footer.php" ?>
</body>
</html>