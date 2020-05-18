<ul class="nav nav-pills nav-justified">
    <li class="nav-item">
        <a class="nav-link <?php if($_SESSION['page']=="admin"){ echo "active"; }?>" href="admin.php">Admin</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($_SESSION['page']=="users"){ echo "active"; }?>" href="admin_users.php">All Users</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($_SESSION['page']=="edit-profile"){ echo "active"; }?>" href="edit_profile.php?id=<?php echo $_SESSION['username_id'] ?>">Edit Profile</a>
    </li>
</ul>
<hr>