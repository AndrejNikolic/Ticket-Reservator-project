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
    <div class="container my-5">
        <h3 class="text-center">Searching for <?php echo $_SESSION['search_term']; ?></h3>
        <ul class="list-unstyled">
        <?php 
        $search_term = $_SESSION['search_term'];
        $sql_search = "SELECT * FROM concert WHERE description LIKE '%$search_term%' OR title LIKE '%$search_term%' OR start_date LIKE '%$search_term%'";

        if($exc = mysqli_query($con, $sql_search)) {
            while ($row = mysqli_fetch_assoc($exc)) {
              echo '<li class="media my-4">
                        <img src="data:image/jpeg;base64,'.base64_encode( $row["image"] ).'" class="mr-3">
                        <div class="row media-body">
                            <div class="col-md-8"><h5 class="mt-0 mb-1">'.$row["title"].' ( '.date("d. M Y. H:m", strtotime($row['start_date'])).' )</h5><span class="desc">'.$row["description"].'</span></div>
                            <div class="col-md-2 prices"><span>$'.$row["price_ticket"].'</span><span>VIP $'.$row["price_vip"].'</span></div>
                            <div class="col-md-2 prices"><a href="concert_details.php?id='. $row['id_concert'] .'" class="btn btn-primary btn-block">RESERVE TICKETS</a></div>
                        </div>
                    </li>';
            }
        }

        mysqli_close($con);
        
        ?>
        </ul>
    </div>
</body>
</html>