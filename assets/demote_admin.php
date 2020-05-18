<?php
session_start();
require_once("../connect.php");
$idItem = $_GET["id"];

if (isset($_SESSION['admin'])){
  $sql = "UPDATE user SET admin = 0 WHERE user.id_user = ?";
  $exc = $con->prepare($sql);
  $exc->bind_param("i", $idItem);
  $exc->execute();

  mysqli_query($con, $sql);

  mysqli_close($con);

  header("Location: ../admin_users.php");
} else {
  echo "You don't have administrator privileges";
}

?>