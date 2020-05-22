<?php
session_start();
require_once("connect.php");

$_SESSION['page']="users";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/resources.php" ?>
    <title>Users - Admin</title>
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
                        $admin = '<a class="btn btn-danger btn-sm" href="assets/admin_funcs.php?id='.$row["id_user"].'&do=demote">Demote</a>';
                    } else {
                            $admin = '<a class="btn btn-info btn-sm" href="assets/admin_funcs.php?id='.$row["id_user"].'&do=promote">Promote</a>';
                    }
                        
                    echo '<tr>
                        <th scope="row">'.$count.'</th>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["first_name"].'</td>
                        <td>'.$row["last_name"].'</td>
                        <td>'.$row["email"].'</td>
                        <td>'.date("d. M Y.", strtotime($row["birthday"])).'</td>
                        <td>'.$row["phone"].'</td>
                        <td>'.$admin.'</td>
                        <td><a href="assets/admin_funcs.php?id='.$row["id_user"].'&do=del-user"><i class="fas fa-trash"></i></a></td>
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