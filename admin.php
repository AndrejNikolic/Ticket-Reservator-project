<?php
session_start();
require_once("connect.php");

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
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Users</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-toggle="tab" href="#new-user" role="tab" aria-controls="new-user" aria-selected="false">Add New User</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Profile</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <table class="table table-hover mt-2 text-center">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Admin?</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //load users
                    $sql = "SELECT id_user, username, first_name, last_name, email, birthday, phone, admin FROM user";
                    $result = mysqli_query($con, $sql);
                    $count = 1;
                    $admin = "";
                
                    while($row = mysqli_fetch_assoc($result)) {
                        if ($row["admin"] == 1) {
                            $admin = '<a class="btn btn-danger btn-sm" href="assets/demote_admin.php?id='.$row["id_user"].'">Demote</a>';
                        } else {
                            $admin = '<a class="btn btn-success btn-sm" href="assets/promote_admin.php?id='.$row["id_user"].'">Promote</a>';
                        }
                        
                        echo '<tr>
                                <th scope="row">'.$count.'</th>
                                <td>'.$row["username"].'</td>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["last_name"].'</td>
                                <td>'.$row["email"].'</td>
                                <td>'.$row["birthday"].'</td>
                                <td>'.$row["phone"].'</td>
                                <td>'.$admin.'</td>
                                <td><a href="delete_user.php?id='.$row["id_user"].'"><i class="fas fa-trash"></i></a></td>
                            </tr>';
                            $count++;
                    }
                    
                    mysqli_close($con);
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">Orders table</div>
            <div class="tab-pane fade" id="new-user" role="tabpanel" aria-labelledby="new-user-tab">  
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Change profile settings</div>
        </div>
    </div>
</body>
</html>