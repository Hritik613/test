<!doctype html>
<html lang="en">
<body>

<h1>List of ALL my movies!!!</h1>

<?php
// Connect to database
$mysqli = new mysqli("localhost", "2410923", "pp2410923", "db2410923");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Run SQL query
$sql = "SELECT * FROM movies ORDER BY rating";
$results = $mysqli->query($sql);

if ($results && $results->num_rows > 0):
?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Movie Name</th>
            <th>Description</th>
            <th>Release Date</th>
            <th>Rating</th>
        </tr>
        <?php while ($a_row = $results->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($a_row['movie-name']) ?></td>
            <td><?= htmlspecialchars($a_row['movie-des']) ?></td>
            <td><?= htmlspecialchars($a_row['released-date']) ?></td>
            <td><?= htmlspecialchars($a_row['rating']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php
else:
    echo "<p>No games found in the database.</p>";
endif;

// Close connection
$mysqli->close();
?>

</body>
</html>