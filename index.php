<!DOCTYPE html>

<html>

  <head>
    <title>HenryBooks | Home</title>
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

    <section class='banner'>
      <div class='container'>
        <div>
          <h3>Welcome to</h2>
          <h1>Henry Books</h1>
          <h2>Online database</h3>
        </div>

        <div class='centered'>
          <form action='search.php' method='post'>
            <input class='searchbar' type='text' name='booksearch-input' placeholder='Search book inventory'>
          </form>
        </div>
      </div>
    </section>

    <section class='container'>
      <div class="boxes-container">
        <div class="box">
          <h1>Search</h1><i class="fa fa-search fa-2x" aria-hidden="true"></i>
          <p>Search the current state of the database book inventory for the different branches of Henry Books.
            Use a full or partial book title as searching criteria.</p>
        </div>
        <div class="box">
          <h1>View</h1><i class="fa fa-book fa-2x" aria-hidden="true"></i>
          <p>View the current state of the database. Navigate through the different tables stored, showing
            the updated values of all tuples for each relation.</p>
        </div>
        <div class="box">
          <h1>Manage</h1><i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
          <p>Administrate Henry Books database. Manage the current state of the database by performing operations
            of addition, update and deletions of tuples for the different relations.</p>
        </div>
      </div>
    </section>


    <section class='default container'>

    </section>
  </body>
</html>
