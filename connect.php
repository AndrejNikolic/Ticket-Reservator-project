<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "reservator";

  $con = mysqli_connect($servername,$username,$password,$dbname);

  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
