<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = '...';
$password = '...';
$host = 'localhost';
$dbname = 'ProjectDatabase';

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["title"])) {
    die("Error: Title is required");
  } else {
    $title = test_input($_POST["title"]);
}

if (empty($_POST["duration"])) {
    die("Error: Duration is required");
  } else {
    $duration = test_input($_POST["duration"]);
}

if (empty($_POST["year"])) {
    die("Error: Year is required");
  } else {
    $year = test_input($_POST["year"]);
}
}*/

?>
<!DOCTYPE html>

<html>

<head>

  <title>MovieDB</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../addstyle.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

</head>

<body style="background-image:linear-gradient(to right, #d38312, #a83279);">

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">

  <a class="navbar-brand" href="#">MovieDB</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button><div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" href="/home.php">Home</a>

          </li>

          <li class="nav-item active">

            <a class="nav-link" href="/add.php">Add Movie <span class="sr-only">(current)</span></a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="/start.php">All Movies</a>

          </li>
			
		<li class="nav-item">
                  <a class="nav-link" href="/streaming.php">Streaming</a>
           </li>
           <li class="nav-item">
                  <a class="nav-link" href="/movievault.php">Crew Vault</a>
                </li>

        </ul>

      </div>

</nav>

<div class="container add-form">

  <h2>Add a new movie:</h2>

  <form action="/insert.php" method="post">

    <table class="center-table">

              <!-- title, year, genre, duration, country, language, production_company, description, imdb_rating, budget, dom_gross, world_gross -->

              <tr><td><label for ="title">Name of Movie:</label></td></tr>
			  <tr><td><input type="text" id="title" name="title" value="" class="add-element" placeholder="Please type in some text"></td></tr>

              <tr><td><label for ="title">Year:</label></td></tr>
			  <tr><td><input type="text" id="year" name="year" value="" class="add-element" placeholder="Please type in a number"></td></tr>

              <tr><td><label for ="title">Genre:</label></td></tr>
			  <tr><td><input type="text" id="genre" name="genre" value="" class="add-element" placeholder="Please type in some text"></td></tr>

              <tr><td><label for ="title">Duration:</label></td></tr>
			  <tr><td><input type="text" id="duration" name="duration" value="" class="add-element" placeholder="Please type in a number"></td></tr>

              <tr><td><label for ="title">Country:</label></td></tr>
			  <tr><td><input type="text" id="country" name="country" value="" class="add-element" placeholder="Please type in some text"></td></tr>

              <tr><td><label for ="title">Language:</label></td></tr>
			  <tr><td><input type="text" id="language" name="language" value="" class="add-element" placeholder="Please type in some text"></td></tr>

              <tr><td><label for ="title">Production Company:</label></td></tr>
			  <tr><td><input type="production_company" id="production_company" name="production_company" value="" class="add-element" placeholder="Please type in some text"></td></tr>

              <tr><td><label for ="title">Description:</label></td></tr>
			  <tr><td><input type="text" id="description" name="description" value="" class="add-element" placeholder="Please type in some text"></td></tr>

              <tr><td><label for ="title">IMDB Rating:</label></td></tr>
			  <tr><td><input type="text" id="imdb_rating" name="imdb_rating" value="" class="add-element" placeholder="Please type in a number"></td></tr>

              <tr><td><label for ="title">Budget:</label></td></tr>
			  <tr><td><input type="text" id="budget" name="budget" value="" class="add-element" placeholder="Please type in a number"></td></tr>

              <tr><td><label for ="title">Domestic Gross:</label></td></tr>
			  <tr><td><input type="text" id="dom_gross" name="dom_gross" value="" class="add-element" placeholder="Please type in a number"></td></tr>

              <tr><td><label for ="title">World Gross:</label></td></tr>
			  <tr><td><input type="text" id="world_gross" name="world_gross" value="" class="add-element" placeholder="Please type in a number"></td></tr>

    </table>

    <input type="submit" value="ADD" class="add-btn">

  </form>

</div>

</body>

</html>