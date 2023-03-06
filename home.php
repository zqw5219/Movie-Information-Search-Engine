<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = '...';
$password = '...';
$host = 'localhost';
$dbname = 'ProjectDatabase';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);




?>

<!DOCTYPE html>
<html>
    <head>
        <title>MovieDB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=".../homestyle.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body style="background-image:linear-gradient(to right, #d38312, #a83279);">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <a class="navbar-brand" href="#">MovieDB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/add.php">Add Movie</a>
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
        <div class="container search-field">
          <h1 class="heading">Search for movie title</h1>
            <form action="" method = "post">
                <input type="text" id="fname" name="term" value="" class="search-bar">
                <input type="submit" value="Search" class="search-btn">
            </form>
            <br>
            <br>
            <br>
            <br>
            <?php
              if (!empty($_REQUEST['term'])) {

                $term = $_REQUEST["term"];
                //$sql = "SELECT * FROM movie_info WHERE title = '".$term."'";
               // $sql = "SELECT * FROM movie_info WHERE title LIKE '".$term."%'";
                $sql = "SELECT * FROM movie_info WHERE title LIKE '".$term."%'";
                $result = $pdo->query($sql);
                
                
                while($row = $result->fetch(PDO::FETCH_ASSOC)){

                echo "<p style='color:white;'>" . 'Title: ' .$row['title']. '</span>';  
                echo '<br /> Year: ' .$row['year'];  
                echo '<br /> Genre: '.$row['genre'];  
                echo '<br /> Duration: '.$row['duration'];  
                echo '<br /> Country: '.$row['country'];
                echo '<br /> Language: '.$row['language'];
                echo '<br /> Production Company: '.$row['production_company'];
                echo '<br /> Description: '.$row['description'];
                echo '<br /> IMDB Rating: '.$row['imdb_rating'];
                echo '<br /> Budget: '.$row['budget'];
                echo '<br /> Domestic Gross: '.$row['dom_gross'];
                echo '<br /> World Gross: '.$row['world_gross'];
                echo '<br />----------------------------------------------------------';
                }
              }
            ?>
        </div>
    </body>
</html>