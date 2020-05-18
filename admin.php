<?php
session_start();
require_once("connect.php");

$_SESSION['page']="admin";

if (!isset($_SESSION['admin'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Admin</title>
</head>
<body>
<?php include "assets/header.php" ?>    
    <div class="container my-5">
        <?php include "admin_navigation.php" ?>

        Welcome <?php echo $_SESSION['username'] ?> to admin panel. 
        Here you should add orders, edit orders, add content, profile page.
        
    </div>
</body>
</html>