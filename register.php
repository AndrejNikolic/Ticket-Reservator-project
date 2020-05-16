<?php
session_start();
require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Register</title>
  </head>
  <body>
  <?php include "header.php" ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <form  class="col-4" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">

            <?php
            $username = $fname = $lname = $email = $phone = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];
                $bday = $_POST["bday"];
                $phone = $_POST["phone"];
                $pass1 = $_POST["pass1"];
                $pass2 = $_POST["pass2"];
                $admin = $_POST["admin"];

                $user = "SELECT * FROM user WHERE username='$username' OR email='$email'";
                $test_user = mysqli_query($con, $user);

                if ($pass1 != $pass2) {
                echo "<div class='alert alert-danger' role='alert'>ERROR: Not matching passwords!</div>";
                }
                else if (mysqli_num_rows($test_user)>=1) {
                echo "<div class='alert alert-danger' role='alert'>ERROR: User already exists!</div>";
                }
                else {

                $password = md5($pass1);

                $sql = "INSERT INTO user (username, first_name, last_name, birthday, phone, email, password, admin) VALUES ('$username', '$fname', '$lname', '$bday', '$phone', '$email', '$password', '$admin')";
                $exc = mysqli_query($con, $sql);

                if ($exc) {
                    echo "User successfully registered!";
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Welcome";

                    $username_id = "SELECT id_user FROM user WHERE username='$username'";

                    $exc = $con->prepare($username_id);
                    $exc->execute();
                    $exc->bind_result($id_user);

                    while ($row = $exc->fetch()) {
                    $_SESSION['username_id'] = $id_user;
                    }

                    header("location: index.php");
                }
                else {
                    echo "Error: " . mysqli_error($con);
                }

                }
            }
            ?>

                <h3 class="text-center">REGISTER</h3>

                <div class="form-group">
                    <label for="username">Username: <span class="red">*</span></label>
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="form-row">
                    <div class="col mb-3">
                        <label for="name">First Name: <span class="red">*</span></label>
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" required>
                    </div>
                    <div class="col">
                        <label for="name">Last Name: <span class="red">*</span></label>
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email: <span class="red">*</span></label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="bday">Birthday: <span class="red">*</span></label>
                    <input type="date" class="form-control" name="bday" value="<?php echo $bday; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone: <span class="red">*</span></label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>" required>
                </div>
                <div class="form-group">
                    <label for="pass1">Password: <span class="red">*</span></label>
                    <input type="password" class="form-control" name="pass1" required>
                </div>
                <div class="form-group">
                    <label for="pass2">Confirm password:</label>
                    <input type="password" class="form-control" name="pass2">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="admin">
                    <label class="form-check-label" for="admin">Admin?</label>
                </div>

                
                <input class="btn btn-primary btn-block" type="submit" value="Register" name="register_user"/>
                <p class="text-center">Already registered?  <a href="login.php">Sign in</a></p>

            </form>
        </div>
    </div>
    

  </body>
</html>
