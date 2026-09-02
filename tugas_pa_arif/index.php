<?php
// 1. DATABASE SEMENTARA (Array 1 Dimensi)
$voucherAktif = ["MERDEKA99", "RPLJUARA", "DISKON50", "ONA"];
$pesan = "";
$warna = ""; 
if (isset($_POST['cek_voucher'])) {
    // MENERIMA INPUT DARI FORM HTML
    $inputUser = strtoupper($_POST['kode_input']);
    // VARIABEL BENDERA (Boolean Flag)
    $ketemu = false; 
    // 2. LOOPING: Pencarian Linear
    foreach ($voucherAktif as $voucher) {
        if ($inputUser == $voucher) {
            $ketemu = true; // Voucher ditemukan!
            break; 
        }
    }
    // 3. BRANCHING: Keputusan akhir
    // === TANTANGAN TAMBAHAN: VOUCHER KHUSUS NAMA PANGGILAN ===
if ($inputUser == "ONA") {
    // KALAU VOUCHER = NAMA PANGGILANKU => PESAN KHUSUS
    $pesan = "HALO ONA! Voucher khusus kamu diterima! Diskon Spesial 50%!";
    $warna = "blue"; // Warna beda biar kelihatan spesial
} elseif ($ketemu == true) {
    // KALAU VOUCHER LAIN YANG BENAR => PESAN BIASA
    $pesan = "Hore! Kode Voucher valid!";
    $warna = "green";
} else {
    // KALAU VOUCHER SALAH => PESAN GAGAL
    $pesan = "Maaf, kode voucher tidak ditemukan.";
    $warna = "red";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Promo Web</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px;
        input { padding: 10px; text-transform: uppercase; }
        button { padding: 10px; background: blue; color: white; border: no
    </style>
</head>
<body>
    <h2>Masukkan Kode Promo</h2>
    <form method="POST">
        <input type="text" name="kode_input" required>
        <button type="submit" name="cek_voucher">Cek Voucher</button>
    </form>
    <h3 style="color: <?php echo $warna; ?>;"><?php echo $pesan; ?></h3>
</body>
</html>