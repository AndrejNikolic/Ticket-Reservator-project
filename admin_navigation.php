<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link <?php if($_SESSION['page']=="admin"){ echo "active"; }?>" href="admin.php">Orders</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($_SESSION['page']=="add-concert"){ echo "active"; }?>" href="admin_add_concert.php">Add Concert</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($_SESSION['page']=="users"){ echo "active"; }?>" href="admin_users.php">Users</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($_SESSION['page']=="edit-profile"){ echo "active"; }?>" href="edit_profile.php?id=<?php echo $_SESSION['username_id'] ?>">Edit Profile</a>
    </li>
</ul>
<hr>