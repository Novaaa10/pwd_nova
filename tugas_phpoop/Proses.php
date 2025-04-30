<?php
require_once 'classes/MenuMakanan.php';
require_once 'classes/Pesanan.php';

$menuList = [
    ["nama" => "Nasi Goreng", "kategori" => "Makanan", "harga" => 15000],
    ["nama" => "Mie Ayam", "kategori" => "Makanan", "harga" => 12000],
    ["nama" => "Es Teh", "kategori" => "Minuman", "harga" => 5000],
    ["nama" => "Kopi Hitam", "kategori" => "Minuman", "harga" => 7000],
];

$pesanan = new Pesanan();

if (isset($_POST['menu'])) {
    foreach ($_POST['menu'] as $index) {
        $data = $menuList[$index];
        $menu = new MenuMakanan($data['nama'], $data['kategori'], $data['harga']);
        $pesanan->tambahMakanan($menu);
    }
}

echo "<h2>Detail Pesanan</h2><ul>";
$pesanan->tampilkanPesanan();
echo "</ul>";
?>
