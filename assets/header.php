<?php
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['username_id']);
  unset($_SESSION['admin']);
  unset($_SESSION['error']);
  unset($_SESSION['cart']);
  header("location: index.php");
}
if (isset($_POST['search'])) {
	$_SESSION['search_term'] = $_POST['search'];
}
?>
<div class="top-bar bg-light">
<div class="container top-bar_items">
	<div class="row">
		<div class="col-md-6">
			<?php
			if(isset($_SESSION['admin'])) {
				echo '<a class="btn btn-info btn-sm mr-2 text-left" href="admin.php" role="button">Admin Panel</a>';
				echo '<a class="btn btn-info btn-sm mr-2 text-left" href="admin_add_concert.php" role="button">Add Concert</a>';	
			}
			?>
		</div>
		<div class="col-md-6 text-right">
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
				<li class="nav-item">
					<a class="nav-link cart <?php if($_SESSION['page']=="tickets"){ echo "active"; }?>" href="cart.php" title="Tickets"><i class="fas fa-ticket-alt"></i>
					<?php 
						if (isset($_SESSION['cart'])) {
							echo '<span class="items-cart">'.sizeof($_SESSION['cart']).'</span>';
						}
					?>
					</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
			<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search concerts..." aria-label="Search">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
    </div>
</nav>