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
<main>
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-3">
        <?php 
            $sql = "SELECT * FROM concert ORDER BY start_date ASC";
            $result = $con->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<div class="col mb-4"><div class="card';

                if (date("Y-m-d", strtotime($row['start_date'])) <= date("Y-m-d")) {
                    echo ' disabled';
                }

                echo '">
                <div class="card-header">
                    <h4 class="card-title text-center">'. $row['title'] .'</h4>
                </div>
                <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="card-img-top" alt="...">
                
                <div class="card-body concert_datetime">
                    <h5>'.date("d. M Y.", strtotime($row['start_date'])).'</h5>/
                    <h5>'.date("H:i", strtotime($row['start_date'])).'</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="price">$'.$row['price_ticket'].'</span><span> '.$row['num_ticket'].' tickets</span></li>
                    <li class="list-group-item vip"><span class="price">$'.$row['price_vip'].' VIP</span><span> '.$row['num_vip'].' tickets</span></li>
                    <li class="list-group-item"><p class="card-text">'. $row['description'] .'</p></li>
                </ul>
                <div class="card-body text-center">
                <a href="concert_details.php?id='. $row['id_concert'] .'" class="btn btn-primary btn-block';
                
                if (date("Y-m-d", strtotime($row['start_date'])) <= date("Y-m-d")) {
                    echo ' disabled';
                }

                echo '">RESERVE TICKETS</a>
                </div>';
                if (isset($_SESSION['admin'])) {
                    echo '<div class="card-body admin_concert-edit">
                            <h5>Administrator:</h5>
                            <div>
                                <a href="edit_concert.php?id='. $row['id_concert'] .'" class="btn btn-info btn-sm">EDIT</a>
                                <a href="assets/admin_funcs.php?id='. $row['id_concert'] .'&do=del-concert" class="btn btn-danger btn-sm">DELETE</a>
                            </div>
                        </div>';
                }
                echo    '</div></div>';
            }
            $con->close();
        ?>
        </div>
    </div>
</main>
<?php include "assets/footer.php" ?>
</body>
</html>