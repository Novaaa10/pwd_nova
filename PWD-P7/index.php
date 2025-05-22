<?php
include_once "config/database.php";
include_once "class/Anime.php";

$database = new Database();
$db = $database->getConnection();

$anime = new Anime($db);
$stmt = $anime->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anime</title>
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
    <h1>Daftar Anime</h1>
    <table>
        <tr>
            <th>Judul</th>
            <th>Genre</th>
            <th>Studio</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?= htmlspecialchars($row['judul']) ?></td>
            <td><?= htmlspecialchars($row['genre']) ?></td>
            <td><?= htmlspecialchars($row['studio']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>