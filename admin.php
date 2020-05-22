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
        <div class="table_overflow">
        <table class="table table-hover mt-2 text-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Concert</th>
                    <th scope="col">Qty</th>
                    <th scope="col">VIP Qty</th>
                    <th scope="col">Fulfilled?</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //load users
                $sql = "SELECT id_ticket, username, first_name, last_name, address, city, title, quantity, quantity_vip, fulfilled FROM ticket INNER JOIN user ON ticket.id_user = user.id_user INNER JOIN concert ON ticket.id_concert = concert.id_concert";
                $result = mysqli_query($con, $sql);
                $count = 1;
                $fulfill = "";
                
                while($row = mysqli_fetch_assoc($result)) {
                    if ($row["fulfilled"] == 0) {
                        $fulfill = '<a class="btn btn-danger btn-sm" href="assets/fulfill_order.php?id='.$row["id_ticket"].'">Fulfill</a>';
                    } else {
                        $fulfill = '<span class="btn btn-success btn-sm" style="pointer-events:none">Fulfilled</span>';
                    }
                        
                    echo '<tr>
                        <th scope="row">'.$count.'</th>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["first_name"].'</td>
                        <td>'.$row["last_name"].'</td>
                        <td>'.$row["address"].'</td>
                        <td>'.$row["city"].'</td>
                        <td>'.$row["title"].'</td>
                        <td>'.$row["quantity"].'</td>
                        <td>'.$row["quantity_vip"].'</td>
                        <td>'.$fulfill.'</td>
                        <td><a href="assets/delete_order.php?id='.$row["id_ticket"].'"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                        $count++;
                    }
                    
                    mysqli_close($con);
                    ?>
            </tbody>
        </table>
                </div>
    </div>
</body>
</html>