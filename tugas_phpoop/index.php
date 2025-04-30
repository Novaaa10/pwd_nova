<?php
$menuList = [
    ["nama" => "Nasi Goreng", "kategori" => "Makanan", "harga" => 15000],
    ["nama" => "Mie Ayam", "kategori" => "Makanan", "harga" => 12000],
    ["nama" => "Es Teh", "kategori" => "Minuman", "harga" => 5000],
    ["nama" => "Kopi Hitam", "kategori" => "Minuman", "harga" => 7000],
];
?>

<h2>Pemesanan Makanan Kantin</h2>
<form action="proses.php" method="POST">
    <p>Pilih Menu:</p>
    <?php foreach ($menuList as $index => $menu) : ?>
        <label>
            <input type="checkbox" name="menu[]" value="<?= $index ?>">
            <?= $menu['nama'] ?> - Rp <?= number_format($menu['harga'], 0, ',', '.') ?>
        </label><br>
    <?php endforeach; ?>
    <br>
    <button type="submit">Pesan Sekarang</button>
</form>
