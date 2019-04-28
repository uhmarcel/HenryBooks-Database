<?php
session_start();
include "dbconnect.inc.php";

/* DELETE action */
if ($_GET["action"] == "del") {
  // Build query
  $sql = "DELETE FROM ".$_SESSION['table']." WHERE ";
  foreach ($_SESSION["query"][$_GET["row"]] as $key => $attribute) {
    $sql .= $key."='".$attribute."' AND ";
  }
  $sql = substr($sql, 0, -5);
  $sql .= ";";

  // Execute query
  mysqli_query($dbConn, $sql);
  header('Location: ../manage.php?success');
  exit();
}
/* EDIT action */
else if ($_GET["action"] == "edit") {
  // Build query
  $sql = "UPDATE ".$_SESSION['table']." SET ";
  $count = 0;

  foreach ($_SESSION["query"][$_GET["row"]] as $key => $attribute) {
    $sql .= $key."='".$_GET["q"][$count]."', ";
    $count++;
  }
  $sql = substr($sql, 0, -2);
  $sql .= " WHERE ";
  foreach ($_SESSION["query"][$_GET["row"]] as $key => $attribute) {
    $sql .= $key."='".$attribute."' AND ";
  }
  $sql = substr($sql, 0, -5);
  $sql .= ";";

  // Execute Query
  mysqli_query($dbConn, $sql);
  header('Location: ../manage.php?success');
  exit();
}
/* ADD action */
else if (!empty($_POST)) {
  // Build query
  $sql = "INSERT INTO ".$_SESSION['table']." VALUES (";
  foreach ($_POST as $value) {
    $sql .= "'".$value."', ";
  }
  $sql = substr($sql, 0, -2);
  $sql .= ");";
  var_dump($sql);

  // Execute query
  if (mysqli_query($dbConn, $sql))
    $_SESSION['status'] = "Success";
  else
    $_SESSION['status'] = "Error: ".mysqli_error($dbConn);

  header('Location: ../manage.php');
  exit();
}

 ?>
