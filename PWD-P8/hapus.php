<?php
require_once "class/Anime.php";

if (!isset($_GET['id_anime'])) {
    echo "ID anime tidak ditemukan.";
    exit;
}

$id = (int)$_GET['id_anime'];
$anime = new Anime();

if ($anime->delete($id)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data.";
}