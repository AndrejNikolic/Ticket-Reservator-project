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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Ticket Reservator</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="concerts.php">Concerts</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit">Search</button>
			</form>
			<?php  
			if(isset($_SESSION['admin'])) {
				echo '<a class="btn btn-primary mr-2" href="admin.php" role="button">Admin</a>';
			}
			if(isset($_SESSION['username'])){
				echo $_SESSION['username'];
			} else {
				echo '<a class="btn btn-outline-primary" href="login.php" role="button">Login / Register</a>';
			}
			?>
			<?php  if(isset($_SESSION['username'])) : ?>
			<a class="btn btn-outline-danger btn-sm ml-2" href="index.php?logout='1'">LOGOUT</a>
			<?php endif ?>
		</div>
    </div>
</nav>