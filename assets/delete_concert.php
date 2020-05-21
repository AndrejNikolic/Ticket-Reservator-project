<?php
session_start();
require_once("../connect.php");
$idItem = $_GET["id"];

if (isset($_SESSION['admin'])){
  $sql = "DELETE FROM concert WHERE id_concert = ?";
  $exc = $con->prepare($sql);
  $exc->bind_param("i", $idItem);
  $exc->execute();

  mysqli_query($con, $sql);

  mysqli_close($con);

  header("Location: ../concerts.php");
} else {
  echo "You don't have administrator privileges";
}

?>