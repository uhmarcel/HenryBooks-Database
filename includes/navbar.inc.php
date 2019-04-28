<?php

$active = "class='active'";
$current = $_SERVER["PHP_SELF"];

$header = "<header>
<div class='container'>
<h1 class='logo'>Henry Books</h1>
<nav> <a ";

if ($current == "/HenryBooks/index.php")
  $header .= $active;
$header .= " href='index.php'>home</a><a ";

if ($current == "/HenryBooks/search.php")
  $header .= $active;
$header .= " href='search.php'>search</a><a ";

if ($current == "/HenryBooks/view.php")
  $header .= $active;
$header .= " href='view.php'>view</a><a ";

if ($current == "/HenryBooks/manage.php")
  $header .= $active;
$header .= " href='manage.php'>manage</a>
</nav>
</div>
</header>";

echo $header;

?>
