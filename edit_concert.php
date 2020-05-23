<?php
session_start();
require_once("connect.php");

$idItem = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Edit Concert - Admin</title>
</head>
<body>
<?php include "assets/header.php" ?>
<div class="container my-5">
<h3>Edit Concert</h3>
<div class="row justify-content-center">
<?php

$title = $description = $num_ticket = $price_ticket = $num_vip = $price_vip = $start_date = "";
$sql = "SELECT id_concert, title, description, num_ticket, price_ticket, num_vip, price_vip, start_date, image FROM concert WHERE id_concert = ?";
$exc = $con->prepare($sql);
$exc->bind_param("i", $idItem);
$exc->execute();
$exc->bind_result($id, $title, $description, $num_ticket, $price_ticket, $num_vip, $price_vip, $start_date, $image_old);

while ($row = $exc->fetch()) {
    $concert_title = $title;
    $concert_description = $description; 
    $concert_num_ticket = $num_ticket;
    $concert_price_ticket = $price_ticket;
    $concert_num_vip = $num_vip;
    $concert_price_vip = $price_vip;
    $concert_start_date = $start_date;
    $concert_image = $image_old;
    $concert_id = $id;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $num_ticket = $_POST["num_ticket"];
    $price_ticket = $_POST["price_ticket"];
    $num_vip = $_POST["num_vip"];
    $price_vip = $_POST["price_vip"];
    $start_date = $_POST["start_date"];

    $sql_up = "UPDATE concert SET title='$title', description='$description', num_ticket='$num_ticket', price_ticket='$price_ticket', num_vip='$num_vip', price_vip='$price_vip', start_date='$start_date' WHERE id_concert=?";

    if ($_FILES['imageFile']['size'] != 0) {
        $image = addslashes(file_get_contents($_FILES['imageFile']['tmp_name']));
        $sql_up = "UPDATE concert SET title='$title', description='$description', num_ticket='$num_ticket', price_ticket='$price_ticket', num_vip='$num_vip', price_vip='$price_vip', image='$image', start_date='$start_date' WHERE id_concert=?";
    }
    
    $exc_up = $con->prepare($sql_up);
    $exc_up->bind_param("i", $id);
    $exc_up->execute();

    mysqli_query($con, $exc_up);
    header("location: concerts.php");

    mysqli_close($con);
}
?>
<form class="col-12" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-md-3 concert_image">
            <label for="imageFile">Image</label>
            <div class="form-group custom-file">
                <input type="file" class="custom-file-input"  id="imageFile" name="imageFile" onchange="readURL(this);">
                <label class="custom-file-label" for="imageFile">Choose Image</label>
            </div>
            <?php echo '<img id="imageView" class="my-2" src="data:image/jpeg;base64,'.base64_encode( $image_old ).'"/>'; ?>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="start_date">Start Date and Time <span class="red">*</span></label>
                <input type="datetime-local" class="form-control" name="start_date" value="<?php echo date('Y-m-d\TH:i', strtotime($concert_start_date))?>" required>
            </div>
            <div class="form-group">
                <label for="title">Title <span class="red">*</span></label>
                <input type="text" class="form-control" name="title" value="<?php echo $concert_title; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description <span class="red">*</span></label>
                <textarea name="description" class="form-control" id="" cols="30" rows="6"><?php echo $concert_description; ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 offset-md-3">
            <div class="form-group">
                <label for="num_ticket">Number of Tickets <span class="red">*</span></label>
                <input type="number" class="form-control" name="num_ticket" value="<?php echo $concert_num_ticket; ?>" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="price_ticket">Price of Tickets <span class="red">*</span></label>
                <input type="number" step="0.01" class="form-control" name="price_ticket" value="<?php echo $concert_price_ticket; ?>" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 offset-md-3">
            <div class="form-group">
                <label for="num_vip">Number of VIP Tickets <span class="red">*</span></label>
                <input type="number" class="form-control" name="num_vip" value="<?php echo $concert_num_vip; ?>" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="price_vip">Price of VIP Tickets <span class="red">*</span></label>
                <input type="number" step="0.01" class="form-control" name="price_vip" value="<?php echo $concert_price_vip; ?>" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 offset-md-3">
            <div class="form-group">
            <input id="add_concert" class="btn btn-primary btn-block" type="submit" value="UPDATE CONCERT" name="update_concert"/>
            </div>
        </div>
    </div>
</form>
</div>
</body>
</html>

