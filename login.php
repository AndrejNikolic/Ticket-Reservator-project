<?php
session_start();
require_once("connect.php");

 if (isset($_SESSION['username'])) {
   header('location: index.php');
 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include "assets/resources.php" ?>

    <title>Login</title>
  </head>
  <body>
  <?php include "assets/header.php" ?>
    <div class="container my-5">
    <h2 class="text-center">LOGIN</h3>
    <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $pass = $_POST["pass"];

            $password = md5($pass);

            $username = "SELECT id_user, admin FROM user WHERE username='$name' AND password='$password'";
            $test_user = mysqli_query($con, $username);

            $exc = $con->prepare($username);
            $exc->execute();
            $exc->bind_result($id_user, $admin);

            if (mysqli_num_rows($test_user) == 1) {
                $_SESSION['username'] = $name;
                $_SESSION['success'] = "Welcome";

                while ($row = $exc->fetch()) {
                $_SESSION['username_id'] = $id_user;
                if ($admin == 1){
                    $_SESSION['admin'] = "(administrator)";
                }
                }
                header('location: index.php');
            }
            else {
                echo "<div class='col-lg-4 offset-lg-4 col-md-6 offset-md-3  alert alert-danger' role='alert'>ERROR: Username or password is wrong!</div>";
            }
            }

            mysqli_close($con);
        ?>
    <div class="row justify-content-center">
        <form class="col-lg-3 col-md-4" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <div class="form-group">
            <label for="name">Username:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="pass">Password:</label>
            <input type="password" class="form-control" name="pass" required>
        </div>
            <input class="btn btn-primary btn-block" type="submit" value="Login" name="login_user"/>
            <p class="text-center">Not yet a member? <a href="register.php">Sign up</a></p>
        </form>
        </div>
    </div>

    

  </body>
</html>
