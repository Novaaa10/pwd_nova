<?php
require_once "class/Anime.php";

if(!isset($_GET['id_anime'])){
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id_anime'];
$anime = new Anime();
$data = $anime->getById($id);
$message = "";

if(!$data){
    echo "Data tidak ditemukan.";
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $anime->id = $id;
    $anime->judul = $_POST['judul'] ?? '';
    $anime->genre = $_POST['genre'] ?? '';
    $anime->studio = $_POST['studio'] ?? '';

    if($anime->update()){
        header("Location: index.php");
        exit;
    } else {
        $message = "Gagal mengubah data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Ubah Anime</title>
<link rel="stylesheet" href="asset/style.css" />
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(to right, #f0f4f8, #dfefff);
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 500px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        color: #f0ad4e;
        margin-bottom: 25px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 15px;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus {
        border-color: #2d89ef;
        outline: none;
    }

    button {
        padding: 10px 16px;
        background-color: #f0ad4e;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s;
    }

    button:hover {
        background-color: #d48806;
        transform: scale(1.05);
    }

    .btn {
        padding: 10px 16px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-size: 15px;
        display: inline-block;
        margin-left: 10px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #5a6268;
    }

    .error {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 6px;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-actions {
        text-align: center;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Ubah Anime</h1>
    <?php if($message) echo "<p class='error'>$message</p>"; ?>
    <form method="post" action="">
        <label>Judul:</label>
        <input type="text" name="judul" required value="<?= htmlspecialchars($data['judul']) ?>">

        <label>Genre:</label>
        <input type="text" name="genre" required value="<?= htmlspecialchars($data['genre']) ?>">

        <label>Studio:</label>
        <input type="text" name="studio" required value="<?= htmlspecialchars($data['studio']) ?>">

        <div class="form-actions">
            <button type="submit">Update</button>
            <a href="index.php" class="btn">Batal</a>
        </div>
    </form>
</div>
</body>
</html>
