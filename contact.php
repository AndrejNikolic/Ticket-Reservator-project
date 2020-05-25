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
        <h3>CONTACT US</h3>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <p>If you have any questions, please feel free to get in touch with us. We will reply to you as soon as possible. Thank you!</p>
                <p>You can also contact us via:
                    <ul>
                        <li>Email: <a href="mailto:info@ticketreservator.com">info@ticketreservator.com</a></li>
                        <li>Phone: <a href="tel:+3816987654321">+381(69)87-65-4321</a></li>
                    </ul>
                </p>
            </div>
        
            <form class="col-md-4" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $subject_user = $_POST['subject'];
                    $message = $_POST['message'];
                    
                    $to = "andrej@ididit.in.rs";
                    $headers = array(
                        'From' => $email,
                        'Reply-To' => $email);
                    $subject = "New message from Ticket Reservator / $subject_user";
                    $full_message = "From: $name \n Message: $message";

                    if (mail($to, $subject, $full_message, $headers)) {
                        echo '<div class="alert alert-success" role="alert">
                            Your message has been sent! Thank you!
                        </div>';
                    }
                }
            ?>
                <div class="form-row">
                    <input type="text" class="form-control col-md-8 mb-2" name="name" placeholder="Your Name*" required>
                </div>
                <div class="form-row">
                    <input type="email" class="form-control col-md-8 mb-2" name="email" placeholder="Your Email*" required>
                </div>
                <div class="form-row">
                    <input type="text" class="form-control col-md-8 mb-2" name="subject" placeholder="Subject">
                </div>
                <div class="form-row">
                    <textarea name="message" class="form-control mb-2" cols="10" rows="4" placeholder="Your message here*" required></textarea>
                    <input class="btn btn-primary btn-block" type="submit" value="SEND MESSAGE" name="register_user"/>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include "assets/footer.php" ?>
</body>
</html>