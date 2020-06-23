<?php
session_start();
require_once("connect.php");

$_SESSION['page']="add-concert";

if (!isset($_SESSION['admin'])) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Add Concert - Admin</title>
</head>
<body>
<?php include "assets/header.php" ?>
<main>
    <div class="container my-5">
    <?php include "admin_navigation.php"; ?>
    <?php $title = $description = $num_ticket = $price_ticket = $num_vip = $price_vip = $start_date = "";
        $image = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $num_ticket = $_POST["num_ticket"];
            $price_ticket = $_POST["price_ticket"];
            $num_vip = $_POST["num_vip"];
            $price_vip = $_POST["price_vip"];
            $image = addslashes(file_get_contents($_FILES['imageFile']['tmp_name']));

            if ($image == "") {
                $image = addslashes(file_get_contents("img/no_image.png"));
            }

            $start_date = $_POST["start_date"];

            $sql = "INSERT INTO concert (title, description, num_ticket, price_ticket, num_vip, price_vip, image, start_date) 
            VALUES ('$title', '$description', '$num_ticket', '$price_ticket', '$num_vip', '$price_vip', '$image', '$start_date')";
            $exc = $con->query($sql);
        
            if ($exc) {
                header("location: concerts.php");
            }
            else {
                echo "Error: " . $con->error($con);
            }

            $con->close($con);
        }
        ?>
        <form class="col-12" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-3 concert_image">
                    <label for="imageFile">Image</label>
                    <div class="form-group custom-file">
                        <input type="file" class="custom-file-input"  id="imageFile" name="imageFile" onchange="readURL(this);">
                        <label class="custom-file-label" for="imageFile">Choose Image</label>
                    </div>
                    <img id="imageView" src="img/no_image.png" class="my-2" alt="">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_date">Start Date and Time <span class="red">*</span></label>
                        <input type="datetime-local" class="form-control" name="start_date" value="<?php echo $start_date; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title <span class="red">*</span></label>
                        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description <span class="red">*</span></label>
                        <textarea name="description" class="form-control" cols="30" rows="6" required><?php echo $description; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 offset-md-3">
                    <div class="form-group">
                        <label for="num_ticket">Number of Tickets <span class="red">*</span></label>
                        <input type="number" class="form-control" name="num_ticket" value="<?php echo $num_ticket; ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="price_ticket">Price of Tickets <span class="red">*</span></label>
                        <input type="number" step="0.01" class="form-control" name="price_ticket" value="<?php echo $price_ticket; ?>" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 offset-md-3">
                    <div class="form-group">
                        <label for="num_vip">Number of VIP Tickets <span class="red">*</span></label>
                        <input type="number" class="form-control" name="num_vip" value="<?php echo $num_vip; ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="price_vip">Price of VIP Tickets <span class="red">*</span></label>
                        <input type="number" step="0.01" class="form-control" name="price_vip" value="<?php echo $price_vip; ?>" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                    <input id="add_concert" class="btn btn-primary btn-block" type="submit" value="CREATE CONCERT" name="create_concert"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include "assets/footer.php" ?>
</body>
</html>