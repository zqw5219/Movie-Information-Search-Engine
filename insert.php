<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = '...';
$password = '...';
$host = 'localhost';
$dbname = 'ProjectDatabase';

function testinput($data) {
  $data = is_numeric($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $year = testinput($_POST["year"]);
  $duration = testinput($_POST["duration"]);
  $budget = testinput($_POST["budget"]);
  $worldgross = testinput($_POST["world_gross"]);
  $domgross = testinput($_POST["dom_gross"]);


if (empty($_POST["title"])) {
    die("Title is required, go back to continue");
  //die("Error: Title is required");
    
}


if (empty($_POST["genre"])) {
  die("Error: Genre is required, go back to continue");
  
}


if (empty($_POST["country"])) {
  die("Error: Country is required, go back to continue");
  
}

if (empty($_POST["language"])) {
  die("Error: Language is required, go back to continue");
  
}

if (empty($_POST["production_company"])) {
  die("Error: Production Company is required, go back to continue");
  
}

if (empty($_POST["description"])) {
  die("Error: Description is required, go back to continue");
  
}

if (empty($_POST["imdb_rating"])) {
    die("Error: IMDB Rating is required, go back to continue");

}
  if($year == false) {
  die("Error: Year must contain only numbers and is Required, go back to continue");
  }

  if($duration== false) {
  die("Error: Duration must contain only numbers and is Required, go back to continue");
  }

  if($budget == false) {
  die("Error: Budget must contain only numbers and is Required, go back to continue");
  }

  if($domgross == false) {
    die("Error: Domestic Gross must contain only numbers and is Required, go back to continue");
  }

  if($worldgross == false) {
    die("Error: World Gross must contain only numbers and is Required, go back to continue");
  }


}



/*if (empty($_POST["title"])) {
    $titleErr = "Title is required";
  } else {
    $title = test_input($_POST["title"]);
}

if (empty($_POST["duration"])) {
    $durationErr = "Duration is required";
  } else {
    $duration = test_input($_POST["duration"]);
}

if (empty($_POST["year"])) {
    $yearErr = "Year is required";
  } else {
    $year = test_input($_POST["year"]);
} */

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add new movie</title>
    </head>
    <body>
    <p>
      <?php
        echo "Inserting new movie: " . $_POST["title"] . " " . $_POST["year"] . " " . $_POST["genre"] . " " . $_POST["duration"] . " " . $_POST["country"] . " " . $_POST["language"] . " " . $_POST["production_company"] . " " . $_POST["description"] . " " . $_POST["imdb_rating"] . " " . $_POST["budget"] . " " . $_POST["dom_gross"] . " " . $_POST["world_gross"] . "...";
        $sql = 'INSERT INTO movie_info (title, year, genre, duration, country, language, production_company, description, imdb_rating, budget, dom_gross, world_gross)';
        $sql = $sql . 'VALUES ("'.$_POST["title"] . '","' . $_POST["year"] . '","' . $_POST["genre"] . '","' . $_POST["duration"] . '","' . $_POST["country"] . '","' . $_POST["language"] . '","' . $_POST["production_company"] . '","' . $_POST["description"] . '","' . $_POST["imdb_rating"] . '","' . $_POST["budget"] . '","' . $_POST["dom_gross"] . '","' . $_POST["world_gross"] . '")';
        try {
          $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conn->exec($sql);
          echo "New record created successfully";
      ?>
        <p>You will be redirected in 3 seconds</p>
        <script>
          var timer = setTimeout(function() {
            window.location='start.php'
          }, 3000);
        </script>
      <?php
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
      ?>
    </p>
    </body>
</div>
</html>
