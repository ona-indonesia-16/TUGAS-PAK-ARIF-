<?php

$nilai = 92;
$sertifikat = "ya";

if ($nilai >= 90) {

    if ($sertifikat == "ya") {
        echo "Diterima di Universitas Harvard";
    } else {
        echo "Tidak Lolos";
    }

} elseif ($nilai >= 75 && $nilai < 90) {

    if ($sertifikat == "ya") {
        echo "Masuk Tahap Seleksi Lanjutan";
    } else {
        echo "Tidak Lolos";
    }

} else {

    echo "Tidak Lolos";
}

?>