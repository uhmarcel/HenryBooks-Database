
<?php

if (!isset($_POST['booksearch-input'])) {
  exit();
}

$user_search_input = $_POST['booksearch-input'];
$search_criteria = "%".$user_search_input."%";

if (empty($user_search_input)) {
  header('Location: ./search.php?error=emptycriteria');
  echo "WRONG";
  exit();
}

require 'dbconnect.inc.php';

$query = "SELECT title, onHand, branchName, authorFirst, authorLast, publisherName
          FROM (((((Book NATURAL JOIN Wrote) NATURAL JOIN Author)
          NATURAL JOIN Publisher) NATURAL JOIN Inventory) NATURAL JOIN Branch)
          WHERE title LIKE $1 AND sequence = 1
          ORDER BY title ASC;";

if ($stmt = pg_prepare($dbConn, "searchQuery", $query)) {
  $result = pg_execute($dbConn, "searchQuery", array($search_criteria));
  $resultRows = pg_num_rows($result);

  echo '<div class=container>';
  echo '<h3>Search results for "'.$user_search_input.'"</h4>';

  if ($resultRows == 0) {
    echo 'No results';
    exit();
  }

  echo '</div>';

  echo "<div class='container shadow'>";
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
  echo "</div>";
}
else {
  echo 'invalid prepared statement';
}


/*
// Display table
if ($resultCheck > 0) {
  echo "<table>";
  echo "<tr>";
  $row = mysqli_fetch_assoc($result);
  foreach ($row as $key => $header)
    echo "<th>".ucfirst($key)."</th>";
  echo "<tr>";

  do {
    echo "<tr>";
    foreach ($row as $attribute)
      echo "<td>".$attribute."</td>";
    echo "</tr>";
  } while ($row = mysqli_fetch_assoc($result));

  echo "</table>";
}
echo "</div>";
 ?>


if ($stmt = mysqli_prepare($dbConn, $query)) {
  mysqli_stmt_bind_param($stmt, "s", $search_criteria);
  mysqli_stmt_execute($stmt);
  my
  $resultRows = mysqli_num_rows($result);sqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt, $titleAttr, $aFirstAttr, $aLastAttr);

  echo '<h3>Search results for "'.$user_search_input.'"</h4>';

  $resultRows = mysqli_stmt_num_rows($stmt);
  if ($resultRows == 0) {
    echo 'No results <br>';
    exit();
  }
  echo 'Found: <br>';

  while (mysqli_stmt_fetch($stmt)) {
    echo "<b>$titleAttr</b> - by $aFirstAttr $aLastAttr <br>";
  }
  mysqli_stmt_close($stmt);
}
else {
  echo 'invalid prepared statement';
}
*/
?>
