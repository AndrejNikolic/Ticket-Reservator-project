<?php
session_start();
require_once("connect.php");

$_SESSION['page']="edit-profile";
$idItem = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Edit Your Profile<?php if (isset($_SESSION['admin'])) { echo " - Admin"; } ?></title>
</head>
<body>
<?php include "assets/header.php" ?>
<main>
<div class="container my-5">
<?php if (isset($_SESSION['admin'])) { include "admin_navigation.php"; } ?>
<div class="row justify-content-center">
<?php

//load user
$username = $fname = $lname = $email = $phone = "";
$sql = "SELECT username, first_name, last_name, email, birthday, phone FROM user WHERE id_user = ?";
$exc = $con->prepare($sql);
$exc->bind_param("i", $idItem);
$exc->execute();
$exc->bind_result($username, $fname, $lname, $email, $birthday, $phone);

while ($row = $exc->fetch()) {
    $user_username = $username; 
    $user_fname = $fname; 
    $user_lname = $lname; 
    $user_email = $email; 
    $user_bday = $birthday; 
    $user_phone = $phone;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $bday = $_POST["bday"];
    $phone = $_POST["phone"];
    $pass1 = $_POST["pass1"];

    if(!empty($pass1)){
        $password = md5($pass1);
        $sql_pass = "UPDATE user SET password='$password' WHERE id_user=?";
        $exc_pass = $con->prepare($sql_pass);
        $exc_pass->bind_param("i", $idItem);
        $exc_pass->execute();

        $con->query($sql_pass);
    }

    $sql_up = "UPDATE user SET first_name='$fname', last_name='$lname', email='$email', birthday='$bday', phone='$phone' WHERE id_user=?";
    $exc = $con->prepare($sql_up);
    $exc->bind_param("i", $idItem);
    $exc->execute();

    $con->query($sql_up);

    header("location: admin.php");
    }
    $con->close();

?>
<form  class="col-lg-4 col-md-5" method="POST">
<h3 class="text-center">Edit Your Profile</h3>

    <div class="my-4 text-center">Username: <strong><?php echo $user_username; ?></strong></div>

    <div class="form-row">
        <div class="col mb-3">
            <label for="name">First Name: <span class="red">*</span></label>
            <input type="text" class="form-control" name="fname" value="<?php echo $user_fname; ?>" required>
        </div>
        <div class="col">
            <label for="name">Last Name: <span class="red">*</span></label>
            <input type="text" class="form-control" name="lname" value="<?php echo $user_lname; ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email: <span class="red">*</span></label>
        <input type="email" class="form-control" name="email" value="<?php echo $user_email; ?>" required>
    </div>
    <div class="form-group">
        <label for="bday">Birthday: <span class="red">*</span></label>
        <input type="date" class="form-control" name="bday" value="<?php echo $user_bday; ?>" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone: <span class="red">*</span></label>
        <input type="tel" class="form-control" name="phone" value="<?php echo $user_phone; ?>" required>
    </div>
    <div class="form-group">
        <label for="pass1">New Password:</label>
        <input type="password" class="form-control" name="pass1">
    </div>
    <input class="btn btn-primary btn-block" type="submit" value="UPDATE" name="register_user"/>
</form>
</div>
</div>
</main>
<?php include "assets/footer.php" ?>
</body>
</html>

