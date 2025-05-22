<?php
require_once "class/Anime.php";
$anime = new Anime();
$stmt = $anime->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Daftar Anime</title>
<link rel="stylesheet" href="asset/style.css" />
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #2d89ef;
        margin-bottom: 30px;
    }

    .btn {
        padding: 10px 16px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-size: 15px;
        transition: background-color 0.3s ease, transform 0.2s;
    }

    .btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-edit {
        background-color: #f0ad4e;
    }

    .btn-edit:hover {
        background-color: #d48806;
    }

    .btn-delete {
        background-color: #d9534f;
    }

    .btn-delete:hover {
        background-color: #b52b27;
    }

    .table-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        text-align: left;
    }

    th {
        background-color: #2d89ef;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #eef5ff;
        transition: background-color 0.3s ease;
    }

    .top-actions {
        max-width: 900px;
        margin: 0 auto 10px;
        text-align: right;
    }
</style>
<script>
function confirmDelete(id){
    if(confirm("Yakin ingin menghapus data ini?")){
        window.location.href = "hapus.php?id_anime=" + id;
    }
}
</script>
</head>
<body>

<h1>Daftar Anime</h1>

<div class="top-actions">
    <a href="tambah.php" class="btn">+ Tambah Anime</a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Studio</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id_anime'] ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= htmlspecialchars($row['genre']) ?></td>
                <td><?= htmlspecialchars($row['studio']) ?></td>
                <td>
                    <a href="edit.php?id_anime=<?= $row['id_anime'] ?>" class="btn btn-edit">Ubah</a>
                    <a href="#" onclick="confirmDelete(<?= $row['id_anime'] ?>)" class="btn btn-delete">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
