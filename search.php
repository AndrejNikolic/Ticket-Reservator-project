<?php
  session_start();
  require_once("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Search</title>
</head>
<body>
<?php include "assets/header.php" ?>
<main>
    <div class="container my-5">
        <h3 class="text-center">Searching for <?php echo $_SESSION['search_term']; ?></h3>
        <ul class="list-unstyled">
        <?php 
        $search_term = $_SESSION['search_term'];
        $sql_search = "SELECT * FROM concert WHERE description LIKE '%$search_term%' OR title LIKE '%$search_term%' OR start_date LIKE '%$search_term%'";

        if($exc = $con->query($sql_search)) {
            while ($row = $exc->fetch_assoc()) {
              echo '<li class="media my-4">
                        <img src="data:image/jpeg;base64,'.base64_encode( $row["image"] ).'" class="align-self-center mr-3">
                        <div class="row media-body">
                            <div class="col-md-8"><h5 class="mt-0 mb-1">'.$row["title"].' ( '.date("d. M Y. H:i", strtotime($row['start_date'])).' )</h5><span class="desc">'.$row["description"].'</span></div>
                            <div class="col-md-2 prices"><span>$'.$row["price_ticket"].'</span><span>VIP $'.$row["price_vip"].'</span></div>
                            <div class="col-md-2 prices"><a href="concert_details.php?id='. $row['id_concert'] .'" class="btn btn-primary btn-block ';

                            if (date("Y-m-d", strtotime($row['start_date'])) <= date("Y-m-d")) {
                                echo ' disabled';
                            }
            
                            echo '">RESERVE TICKETS</a></div>
                        </div>
                    </li>';
            }
        }

        $con->close();
        
        ?>
        </ul>
    </div>
    
</main>
<?php include "assets/footer.php" ?>
</body>
</html>