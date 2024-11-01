<?php
class CetakBilangan {
    // Method untuk mencetak bilangan sesuai ketentuan
    public function cetak($n) {
        for ($i = 1; $i <= $n; $i++) {
            if ($i % 4 == 0 && $i % 6 == 0) {
                echo "Pemrograman Website 2024<br>";
            } elseif ($i % 5 == 0) {
                echo "2024<br>";
            } elseif ($i % 4 == 0 && $i % 6 != 0) {
                echo "Pemrograman<br>";
            } elseif ($i % 6 == 0 && $i % 4 != 0) {
                echo "Website<br>";
            } else {
                echo $i . "<br>";
            }
        }
    }
}

// Membuat objek dari class CetakBilangan
$cetakBilangan = new CetakBilangan();

// Memanggil method cetak dengan nilai n yang diinginkan
$cetakBilangan->cetak(24); // Sesuaikan dengan batas nilai yang diinginkan
?>