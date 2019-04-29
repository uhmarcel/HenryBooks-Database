<?php
session_start();
require 'dbconnect.inc.php';

$currentTable = 'Book';
if (isset($_POST['tables-button'])) {
  $currentTable = $_POST['tables-button'];
}

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
$result = pg_query($dbConn, $sql) or die("Bad query: ".$sql);
$resultCheck = pg_num_rows($result);

// Display table
if ($resultCheck > 0) {
  echo "<table>";
  echo "<tr>";
  $row = pg_fetch_assoc($result);
  foreach ($row as $key => $header)
    echo "<th>".ucfirst($key)."</th>";
  echo "<tr>";

  do {
    echo "<tr>";
    foreach ($row as $attribute)
      echo "<td>".$attribute."</td>";
    echo "</tr>";
  } while ($row = pg_fetch_assoc($result));

  echo "</table>";
}
echo "</div>";
 ?>
