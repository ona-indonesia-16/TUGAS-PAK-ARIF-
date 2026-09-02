<?php
// ==============================================
// DATABASE VOUCHER — ARRAY MULTIDIMENSI
// ==============================================
$voucherDb = [
    [
        "kode" => "RPLJUARA",
        "potongan" => 50000,
        "min_belanja" => 150000,
        "kuota" => 10
    ],
    [
        "kode" => "HEMATTERUS",
        "potongan" => 20000,
        "min_belanja" => 50000,
        "kuota" => 0 // Kuota habis!
    ],
    [
        "kode" => "KILAT",
        "potongan" => 10000,
        "min_belanja" => 20000,
        "kuota" => 50
    ]
];

$pesan = "";
$warna = "";

if (isset($_POST['cek_voucher'])) {
    $inputUser = strtoupper($_POST['kode_input']);
    $totalBelanja = $_POST['total_belanja']; // Ambil input total belanja
    $ketemu = false;
    $dataVoucher = null;

    // ==============================================
    // 1. CARI KODE VOUCHER
    // ==============================================
    foreach ($voucherDb as $v) {
        if ($inputUser == $v['kode']) {
            $ketemu = true;
            $dataVoucher = $v;
            break;
        }
    }

    // ==============================================
    // 2. LOGIKA BERTINGKAT — NESTED IF
    // ==============================================
    if (!$ketemu) {
        $pesan = "Voucher tidak valid!";
        $warna = "red";
    } else {
        // Kode ditemukan => cek kuota dulu
        if ($dataVoucher['kuota'] <= 0) {
            $pesan = "Maaf, Kuota voucher habis!";
            $warna = "red";
        }
        // Kuota aman => cek minimal belanja
        elseif ($totalBelanja < $dataVoucher['min_belanja']) {
            $pesan = "Minimal belanja tidak terpenuhi! Minimal: Rp " . number_format($dataVoucher['min_belanja'], 0, '', '.');
            $warna = "orange";
        }
        //SEMUA SYARAT TERPENUHI => hitung total bayar
        else {
            $totalBayar = $totalBelanja - $dataVoucher['potongan'];
            // Cegah angka minus
            if ($totalBayar < 0) $totalBayar = 0;

            $pesan = "Voucher BERHASIL! Potongan: Rp " . number_format($dataVoucher['potongan'], 0, '', '.') .
                     " | Total Bayar: Rp " . number_format($totalBayar, 0, '', '.');
            $warna = "green";
        }
    }
}
?>

<!-- ============================================== -->
<!-- FORM DENGAN INPUT TOTAL BELANJA -->
<!-- ============================================== -->
<!DOCTYPE html>
<html>
<head>
    <title>Promo Web</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px; }
        input { padding: 10px; font-size: 16px; width: 250px; margin: 5px; }
        button { padding: 10px 20px; background: blue; color: white; border: none; cursor: pointer; font-size: 16px; }
    </style>
</head>
<body>
    <h2>Masukkan Kode Promo & Total Belanja</h2>
    <form method="POST">
        <input type="text" name="kode_input" placeholder="Kode Voucher" required><br>
        <input type="number" name="total_belanja" placeholder="Total Belanja (Rp)" required><br>
        <button type="submit" name="cek_voucher">Cek & Hitung</button>
    </form>
    <h3 style="color: <?php echo $warna; ?>;"><?php echo $pesan; ?></h3>
</body>
</html>