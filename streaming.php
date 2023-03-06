<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = '...';
$password = '...';
$host = 'localhost';
$dbname = 'ProjectDatabase';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT * FROM streaming ORDER BY rt_rating DESC LIMIT 200';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>

<!DOCTYPE html>
<html style="background-color: #1D253C;">
    <head>
        <title>MovieDB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="#">MovieDB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/home.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/add.php">Add Movie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/start.php">All Movies</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/streaming.php">Streaming <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/movievault.php">Crew Vault</a>
                </li>
              </ul>
            </div>
          </nav>
        <div id="container">
        <div class="container">
        <div style="margin-top: 20px;"></div>
        <!-- title rt_rating netflix hulu disney  -->
            <h2>Where to watch (TOP 200 Highest Rated Movies)</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Name of Movie</th>
                        <th>Rotten Tomatoes Rating</th>
                        <th>Netflix (0 - No 1 - Yes)</th>
                        <th>Hulu (0 - No 1 - Yes)</th>
                        <th>Disney+ (0 - No 1 - Yes)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                        <!-- title, year, genre, duration, country, language, production_company, description, imdb_rating, budget, dom_gross, world_gross -->
                            <td><?php echo htmlspecialchars($row['title']) ?></td>
                            <td><?php echo htmlspecialchars($row['rt_rating']); ?></td>
                            <td><?php echo htmlspecialchars($row['netflix']); ?></td>
                            <td><?php echo htmlspecialchars($row['hulu']); ?></td>
                            <td><?php echo htmlspecialchars($row['disney']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		<br>
		<br><br><br>
    </body>
</div>
</div>
</html>