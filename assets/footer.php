<footer class="bg-dark">
    <div class="container pt-2 pb-1">
        <div class="row">
            <div class="col-md-6 text-muted small py-2">
                Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="https://andrej.na.rs">Andrej Nikolić</a>. All Rights Reserved. Designed & developed with <i class="fas fa-heart text-danger"></i> by me.
            </div>
            <div class="col-md-6 small py-2">
                <ul class="nav footer-nav justify-content-end">
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
            </div>
        </div>
    </div>
</footer>