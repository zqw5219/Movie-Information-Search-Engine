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
    $sql = 'SELECT * FROM movie_info ORDER BY m_id DESC LIMIT 200';
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
                <li class="nav-item active">
                  <a class="nav-link" href="/start.php">All Movies <span class="sr-only">(current)</span></a>
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
        <div id="container">
        <div class="container">
        <div style="margin-top: 20px;"></div>
            <h2>All Movies (TOP 200 Most Recent Table Entries)</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Name of Movie</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th>Duration</th>
                        <th>Country</th>
                        <th>Language</th>
                        <th>Production Company</th>
                        <th>Descripton</th>
                        <th>IMDB Rating</th>
                        <th>Budget</th>
                        <th>Domestic Gross</th>
                        <th>World Gross</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                        <!-- title, year, genre, duration, country, language, production_company, description, imdb_rating, budget, dom_gross, world_gross -->
                            <td><?php echo htmlspecialchars($row['title']) ?></td>
                            <td><?php echo htmlspecialchars($row['year']); ?></td>
                            <td><?php echo htmlspecialchars($row['genre']); ?></td>
                            <td><?php echo htmlspecialchars($row['duration']); ?></td>
                            <td><?php echo htmlspecialchars($row['country']); ?></td>
                            <td><?php echo htmlspecialchars($row['language']); ?></td>
                            <td><?php echo htmlspecialchars($row['production_company']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo htmlspecialchars($row['imdb_rating']); ?></td>
                            <td><?php echo htmlspecialchars($row['budget']); ?></td>
                            <td><?php echo htmlspecialchars($row['dom_gross']); ?></td>
                            <td><?php echo htmlspecialchars($row['world_gross']); ?></td>
                            <td><?php echo '<form action="/delete.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="title" value="' . htmlspecialchars($row['title']) . '"></form>'; ?></td>
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
