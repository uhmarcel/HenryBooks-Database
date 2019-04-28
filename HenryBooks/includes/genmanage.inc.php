<?php
session_start();
require 'dbconnect.inc.php';
/*
if (isset($_SESSION["status"])) {
    echo "<h4 class='container'>".$_SESSION["status"]."</h4>";
}*/


$currentTable = 'Book';
if (isset($_POST['tables-button'])) {
  $currentTable = $_POST['tables-button'];
}
else if (isset($_SESSION["table"])) {
  $currentTable = $_SESSION["table"];
}
$_SESSION['table'] = $currentTable;

// Build Table buttons
$active = "class='active2'";
$tableButtons = "<div class='container shadow'>
<form class='buttons-panel' name='tables-form' method='post'>
<button type='submit' name='tables-button' ";

if ($currentTable == "Book")
  $tableButtons .= $active;
$tableButtons .= " value='Book'>Book</button>
<button type='submit' name='tables-button' ";

if ($currentTable == "Author")
  $tableButtons .= $active;
$tableButtons .= " value='Author'>Author</button>
<button type='submit' name='tables-button' ";

if ($currentTable == "Branch")
  $tableButtons .= $active;
$tableButtons .= " value='Branch'>Branch</button>
<button type='submit' name='tables-button' ";

if ($currentTable == "Copy")
  $tableButtons .= $active;
$tableButtons .= " value='Copy'>Copy</button>
<button type='submit' name='tables-button' ";

if ($currentTable == "Inventory")
  $tableButtons .= $active;
$tableButtons .= " value='Inventory'>Inventory</button>
<button type='submit' name='tables-button' ";

if ($currentTable == "Publisher")
  $tableButtons .= $active;
$tableButtons .= " value='Publisher'>Publisher</button>
<button type='submit' name='tables-button' ";

if ($currentTable == "Wrote")
  $tableButtons .= $active;
$tableButtons .= " value='Wrote'>Wrote</button>
</form></div>";

echo $tableButtons;
echo "<div class='spacer'></div><div class='container shadow'>";


// Query
$sql = "SELECT * FROM ".$currentTable.";";
$result = mysqli_query($dbConn, $sql) or die("Bad query: ".$sql);
$resultCheck = mysqli_num_rows($result);

// Display table
if ($resultCheck > 0) {
  // Build table headers
  echo "<table>"; // start table
  echo "<tr>"; // start header row
  $row = mysqli_fetch_assoc($result);
  foreach ($row as $key => $header)
    echo "<th>".ucfirst($key)."</th>";
  echo "<th colspan='2' class='active'>Manage</th>";
  echo "<tr>"; // end header row

  $_SESSION["query"] = array();
  $count = 0;

  // Build table rows
  do {
    echo "<tr>"; // start row
    $_SESSION["query"][$count] = array();
    foreach ($row as $key => $attribute) {
      $_SESSION["query"][$count][$key] = $attribute;
      echo "<td>".$attribute."</td>";
    }
    // Add edit and delete buttons
    echo "<td class='no-pad'><button type='submit' onclick='prepareEditQuery(this)'
         name='".$count."'><i class='fa fa-pencil' aria-hidden='true'></button></td>";
    echo "<td class='no-pad'><button type='submit'
         onclick=location.href='includes/manageaction.inc.php?action=del&row="
         .$count."';><i class='fa fa-trash' aria-hidden='true'></button></td>";
    echo "</tr>"; // end row
    $count++;
  } while ($row = mysqli_fetch_assoc($result));

  // Build add row
  echo "<tr id='selected'>"; // start add row
  echo "<form action='includes/manageaction.inc.php' autocomplete='off' method='post'>"; // start add form
  foreach ($_SESSION["query"][0] as $key => $attribute) {
    echo "<td><input type='text' class='in-edit' name='".$key."' placeholder='".ucfirst($key)."'/></td>";
  }
  echo "<td colspan=2 class='no-pad'><button type='submit'><i class='fa fa-plus' aria-hidden='true'></i></button></td>";

  echo "</form>"; // end add form
  echo "</tr>"; // end add row
  echo "</table>"; // end table
}
echo "</div>";
 ?>
