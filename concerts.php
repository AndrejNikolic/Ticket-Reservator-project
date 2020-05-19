<?php
session_start();
require_once("connect.php");

$_SESSION['page']="concerts";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Concerts</title>
</head>
<body>
    <?php include "assets/header.php" ?>  
    <div class="container my-5">
        <div class="card-columns">
        <?php 
            $sql = "SELECT * FROM concert";
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-center">'. $row['title'] .'</h4>
                            </div>
                            <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="card-img-top" alt="...">
                            
                            <div class="card-body concert_datetime">
                                <h5>'.date("d. M Y.", strtotime($row['start_date'])).'</h5>/
                                <h5>'.date("H:m", strtotime($row['start_date'])).'</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">'.date("d. M Y.", strtotime($row['start_date'])).'</li>
                                <li class="list-group-item">TIME: '.date("H:m", strtotime($row['start_date'])).'</li>
                                <li class="list-group-item"><p class="card-text">'. $row['description'] .'</p></li>
                            </ul>
                            <div class="card-body text-center">
                            <a href="concert_details.php?id='. $row['id_concert'] .'" class="btn btn-primary">RESERVE TICKETS</a>
                            </div>
                        </div>';
            }
        ?>
        </div>
    </div>
</body>
</html>