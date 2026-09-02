<!DOCTYPE html>
<html>
<head>
    <title>Seleksi Beasiswa Universitas</title>
</head>
<body>

    <h2>FORM SELEKSI BEASISWA</h2>

    <form method="post">

        <label>Nama Peserta:</label><br>
        <input type="text" name="nama" required>
        <br><br>

        <label>Nilai Ujian:</label><br>
        <input type="number" name="nilai" min="0" max="100" required>
        <br><br>

        <label>Memiliki Sertifikat Matematika Internasional?</label><br>
        <select name="sertifikat" required>
            <option value="">-- Pilih --</option>
            <option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
        </select>
        <br><br>

        <button type="submit" name="cek">Cek Hasil</button>

    </form>

    <?php

    if (isset($_POST['cek'])) {

        $nama = $_POST['nama'];
        $nilai = $_POST['nilai'];
        $sertifikat = $_POST['sertifikat'];

        if ($nilai >= 90) {

            if ($sertifikat == "ya") {
                $hasil = "DITERIMA DI UNIVERSITAS HARVARD";
            } else {
                $hasil = "TIDAK LOLOS";
            }

        } elseif ($nilai >= 75 && $nilai < 90) {

            if ($sertifikat == "ya") {
                $hasil = "MASUK TAHAP SELEKSI LANJUTAN";
            } else {
                $hasil = "TIDAK LOLOS";
            }

        } else {

            $hasil = "TIDAK LOLOS";
        }

        echo "<h3>Hasil Seleksi</h3>";
        echo "Nama Peserta: <b>$nama</b><br>";
        echo "Nilai Ujian: <b>$nilai</b><br>";
        echo "Sertifikat: <b>$sertifikat</b><br>";
        echo "Hasil: <b>$hasil</b>";
    }

    ?>

</body>
</html>