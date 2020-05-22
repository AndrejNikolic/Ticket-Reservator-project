<?php
session_start();
require_once("../connect.php");
$idItem = $_GET["id"];
$command = $_GET["do"];

if (isset($_SESSION['admin'])){
  if ($command == "fulfill"){
    $sql = "UPDATE ticket SET fulfilled = 1 WHERE id_ticket = ?";
  } 
  elseif ($command == "promote") {
    $sql = "UPDATE user SET admin = 1 WHERE id_user = ?";
  }
  elseif ($command == "demote") {
    $sql = "UPDATE user SET admin = 0 WHERE id_user = ?";
  }
  elseif ($command == "del-concert") {
    $sql = "DELETE FROM concert WHERE id_concert = ?";
  }
  elseif ($command == "del-user") {
    $sql = "DELETE FROM user WHERE id_user = ?";
  }

  $exc = $con->prepare($sql);
  $exc->bind_param("i", $idItem);
  $exc->execute();

  mysqli_query($con, $sql);

  mysqli_close($con);

  if ($command == "fulfill"){
    header("Location: ../admin.php");
  } 
  elseif ($command == "promote" || $command == "demote") {
    header("Location: ../admin_users.php");
  }
  elseif ($command == "del-concert") {
    header("Location: ../concerts.php");
  }
  elseif ($command == "del-user") {
    header("Location: ../admin_users.php");
  }
  
} else {
  echo "You don't have administrator privileges! <a href='../index.php'>GO HOME</a>";
}

?>