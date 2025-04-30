<?php
class Pesanan {
    public $daftarMakanan = [];

    public function tambahMakanan(MenuMakanan $makanan) {
        $this->daftarMakanan[] = $makanan;
    }

    public function hitungTotal() {
        $total = 0;
        foreach ($this->daftarMakanan as $makanan) {
            $total += $makanan->harga;
        }
        return $total;
    }

    public function tampilkanPesanan() {
        foreach ($this->daftarMakanan as $makanan) {
            echo "<li>" . $makanan->getInfo() . "</li>";
        }
        echo "<strong>Total: Rp " . $this->hitungTotal() . "</strong>";
    }
}
?>
