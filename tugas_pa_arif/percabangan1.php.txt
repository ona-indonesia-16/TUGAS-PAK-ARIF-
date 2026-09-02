<?php

$umur = 18;

if ($umur < 5) {
    $harga = 15000;
} elseif ($umur <= 16) {
    $harga = 30000;
} elseif ($umur <= 30) {
    $harga = 40000;
} else {
    $harga = 0;
}

echo "Umur Riyo: " . $umur . " tahun<br>";
echo "Harga tiket: Rp" . number_format($harga, 0, ',', '.');

?>