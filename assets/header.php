<?php
//if (!isset($_SESSION['username'])) {
  //$_SESSION['msg'] = "You must log in first";
  //header('location: login.php');
//} else { $_SESSION['msg'] = ""; }

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['username_id']);
  unset($_SESSION['admin']);
  header("location: index.php");
}
?>
<div class="top-bar bg-light">
<div class="container top-bar_items">
	<div>
		<?php
		if(isset($_SESSION['admin'])) {
			echo '<a class="btn btn-info btn-sm mr-2 text-left" href="admin.php" role="button">Admin Panel</a>';	
		}
		?>
	</div>
	<div class="text-right">
	<?php  
		if(isset($_SESSION['username'])){
			echo "<span>Welcome, " . $_SESSION['username']."</span>";
		} else {
			echo '<a class="btn btn-info btn-sm" href="login.php" role="button">Login / Register</a>';
		}
		
	?>
	<?php  if(isset($_SESSION['username'])) : ?>
		<a class="btn btn-info btn-sm ml-2" href="edit_profile.php?id=<?php echo $_SESSION['username_id'] ?>" role="button">EDIT</a>
		<a class="btn btn-danger btn-sm ml-2" href="index.php?logout=1">LOGOUT</a>
	<?php endif ?>
	</div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo5.png" alt=""><span class="logo-name">Ticket<br>Reservator</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav m-auto">
				<li class="nav-item">
					<a class="nav-link <?php if($_SESSION['page']=="index"){ echo "active"; }?>" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($_SESSION['page']=="concerts"){ echo "active"; }?>" href="concerts.php">Concerts</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($_SESSION['page']=="contact"){ echo "active"; }?>" href="contact.php">Contact</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
    </div>
</nav>