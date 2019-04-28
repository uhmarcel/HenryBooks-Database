<!DOCTYPE html>

<html>
  <head>
    <title>HenryBooks | Search</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Sample HTML/CSS website">
    <meta name="keywords" content="HTML, CSS, HTML/CSS website">
    <meta name="author" content="Marcel Riera">
  </head>

  <body>
    <?php include "includes/navbar.inc.php"; ?>

    <div class="container search">
      <h2>Search Inventory</h2><i class="fa fa-search fa-2x" aria-hidden="true"></i>
      <p>Search the current state of the database book inventory for the different branches of Henry Books.</br>
        Use a full or partial book title as searching criteria.</p>
      <form action='search.php' method='post'>
        <input class='searchbar' type='text' name='booksearch-input' placeholder='Search book inventory'>
      </form>
      <div class="spacer"></div>
    </div>
    <?php include "includes/booksearch.inc.php"; ?>
    <div class="spacer"></div>
  </body>
</html>
