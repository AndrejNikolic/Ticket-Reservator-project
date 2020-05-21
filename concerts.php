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
                                <li class="list-group-item"><span class="price">$'.$row['price_ticket'].'</span><span> '.$row['num_ticket'].' tickets</span></li>
                                <li class="list-group-item vip"><span class="price">$'.$row['price_vip'].' VIP</span><span> '.$row['num_vip'].' tickets</span></li>
                                <li class="list-group-item"><p class="card-text">'. $row['description'] .'</p></li>
                            </ul>
                            <div class="card-body text-center">
                            <a href="concert_details.php?id='. $row['id_concert'] .'" class="btn btn-primary btn-block">RESERVE TICKETS</a>
                            </div>';
                if (isset($_SESSION['admin'])) {
                    echo '<div class="card-body admin_concert-edit">
                            <h5>Administrator:</h5>
                            <div>
                                <a href="concert_edit.php?id='. $row['id_concert'] .'" class="btn btn-success btn-sm">EDIT</a>
                                <a href="assets/delete_concert.php?id='. $row['id_concert'] .'" class="btn btn-danger btn-sm">DELETE</a>
                            </div>
                        </div>';
                }
                echo    '</div>';
            }
        ?>
        </div>
    </div>
</body>
</html>