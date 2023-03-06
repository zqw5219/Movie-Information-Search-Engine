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
    $sql = 'SELECT title, cname, job, language, country, genre FROM all_movies am, movie_crew mc, crew c, movie_genre mg, movie_country mcc, movie_lang ml WHERE am.m_id = mc.m_id AND mc.c_id = c.c_id AND am.m_id = mg.m_id AND am.m_id = mcc.m_id AND am.m_id = ml.m_id LIMIT 1000';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>MovieDB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light">
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
                <li class="nav-item">
                  <a class="nav-link" href="/streaming.php">Streaming</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="/movievault.php">Crew Vault<span class="sr-only">(current)</span></a> 
                </li>
              </ul>
            </div>
          </nav>
        <div id="container">
        <div class="container">
        <div style="margin-top: 20px;"></div>
            <h2>Extra Info (TOP 1000 Most Recent Table Entries)</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Name of Movie</th>
                        <th>Cast</th>
                        <th>Role</th>
                        <th>Language</th>
                        <th>Country</th>
                        <th>Genre</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                        <!-- title, year, genre, duration, country, language, production_company, description, imdb_rating, budget, dom_gross, world_gross -->
                            <td><?php echo htmlspecialchars($row['title']) ?></td>
                            <td><?php echo htmlspecialchars($row['cname']) ?></td>
                            <td><?php echo htmlspecialchars($row['job']) ?></td>
                            <td><?php echo htmlspecialchars($row['language']) ?></td>
                            <td><?php echo htmlspecialchars($row['country']) ?></td>
                            <td><?php echo htmlspecialchars($row['genre']) ?></td>
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