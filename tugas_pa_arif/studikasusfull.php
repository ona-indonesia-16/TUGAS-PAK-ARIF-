<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Studi Kasus 1 - Sistem Kasir Mini</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #cbd5e1; padding: 8px 12px; }
        th { background-color: #0f172a; color: white; text-align: left; }
        .total-row { background-color: #e2e8f0; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Sistem Kasir Mini - SMK Mart</h2>

    <?php
    // Array multidimensi 10 produk
    $produk = [
        ["nama" => "Beras Setra Ramos 5 Kg", "harga" => 74500],
        ["nama" => "Minyak Goreng Bimoli 2L", "harga" => 35000],
        ["nama" => "Gula Pasir Gulaku 1 Kg", "harga" => 17500],
        ["nama" => "Teh Celup Sosro Box", "harga" => 11000],
        ["nama" => "Kopi Kapal Api Spesial", "harga" => 14500],
        ["nama" => "Indomie Goreng Special", "harga" => 3100],
        ["nama" => "Susu Kental Manis Indomilk", "harga" => 12500],
        ["nama" => "Sabun Mandi Lifebuoy", "harga" => 4500],
        ["nama" => "Shampo Clear Men 160ml", "harga" => 24000],
        ["nama" => "Pasta Gigi Pepsodent", "harga" => 13500]
    ];
    ?>

    <table>
        <tr>
            <th style="width: 10%;">No</th>
            <th>Nama Produk</th>
            <th style="width: 25%;">Harga Satuan (Rp)</th>
        </tr>

        <?php
        $no = 1;
        $total_harga = 0;

        foreach ($produk as $item) {
            echo "<tr>";
            echo "<td style='text-align:center;'>" . $no++ . "</td>";
            echo "<td>" . $item['nama'] . "</td>";
            echo "<td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>";
            echo "</tr>";

            // Akumulasi total
            $total_harga += $item['harga'];
        }
        ?>

        <tr class="total-row">
            <td colspan="2" style="text-align: right;">TOTAL PEMBELIAN:</td>
            <td>Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></td>
        </tr>
    </table>

</body>
</html>

<?php
$data_siswa = [
    ["nama" => "Ahmad Fauzi",     "nilai" => 85],
    ["nama" => "Bunga Lestari",   "nilai" => 70],
    ["nama" => "Chandra Wijaya",  "nilai" => 92],
    ["nama" => "Dewi Sartika",    "nilai" => 78],
    ["nama" => "Eko Prasetyo",    "nilai" => 65],
    ["nama" => "Fathur Rahman",   "nilai" => 88],
    ["nama" => "Gita Permata",    "nilai" => 74],
    ["nama" => "Hadi Saputra",    "nilai" => 80],
    ["nama" => "Indah Kusuma",    "nilai" => 95],
    ["nama" => "Joko Susilo",     "nilai" => 60]
];

echo "<h3>Laporan Evaluasi Hasil Belajar Siswa (KKM = 75)</h3>";
echo "<table border='1' cellpadding='8' style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background:#1e293b; color:white;'><th>No</th><th>Nama Siswa</th><th>Nilai Akhir</th><th>Status Kelulusan</th></tr>";

$no = 1;
foreach ($data_siswa as $siswa) {
    if ($siswa['nilai'] >= 75) {
        $status = "<span style='color:#059669; font-weight:bold;'>LULUS</span>";
    } else {
        $status = "<span style='color:#dc2626; font-weight:bold;'>REMEDIAL</span>";
    }

    echo "<tr>";
    echo "<td align='center'>" . $no++ . "</td>";
    echo "<td>" . $siswa['nama'] . "</td>";
    echo "<td align='center'><strong>" . $siswa['nilai'] . "</strong></td>";
    echo "<td>" . $status . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<?php

echo "<h3>Generator Kode Tiket Bioskop Studio 1 (A001 - A100)</h3>";
echo "<div style='display:flex; flex-wrap:wrap; gap:5px;'>";

for ($i = 1; $i <= 100; $i++) {
    // Membentuk format 3 digit dengan angka nol di depan
    $nomor_tiket = "A" . str_pad($i, 3, "0", STR_PAD_LEFT);

    echo "<span style='background:#1e40af; color:white; padding:4px 8px; border-radius:4px; font-size:11px;'>";
    echo $nomor_tiket;
    echo "</span>";
}

echo "</div>";
?>