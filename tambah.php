<?php

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sesuaikan atribut dengan nama dari nilai-nilai yang perlu dimasukkan ke db
    var_dump($_POST);
    $nama_pemanen = $_POST['nama_pemanen'];
    $nama_pemanen = $_POST['nama_pemanen'];
    $buah_sangat_matang  = $_POST['buah_sangat_matang'];
    $jumlah_janjang = $_POST['jumlah_janjang'];
    $buah_mentah = $_POST['buah_mentah'];
    $tanggal_pengambilan = $_POST['tanggal_pengambilan'];
    $nama_peberondol = $_POST['nama_peberondol'];
    // Tambahkan atribut lain sesuai kebutuhan

    $sql = "INSERT INTO datakebun ( nama_pemanen ,buah_sangat_matang, jumlah_janjang, buah_mentah,  tanggal_pengambilan, nama_peberondol ) VALUES (?, ?, ?, ?, ?, ?)";
    $row = $koneksi->execute_query($sql, [$nama_pemanen, $buah_sangat_matang, $jumlah_janjang, $buah_mentah,$tanggal_pengambilan, $nama_peberondol ]);

    // Bila berhasil, $row akan bernilai true
    if ($row) {
        header("Location: data.php");
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kebun</title>
</head>
<body>
    <h1>Tambah Data Kebun</h1>

    <form action="" method="post">
        <div class="form-item">
            <label for="nama_pemanen">Nama Pemanen</label>
            <input type="text" name="nama_pemanen" id="nama_pemanen" required>
        </div>

        <div class="form-item">
            <label for="buah_sangat_matang">Buah Sangat Matang</label>
            <input type="number" name="buah_sangat_matang" id="buah_sangat_matang" required>
        </div>

        <div class="form-item">
            <label for="jumlah_janjang">Jumlah Janjang</label>
            <input type="number" name="jumlah_janjang" id="jumlah_janjang" required>
        </div>

        <div class="form-item">
            <label for="buah_mentah">Buah Mentah</label>
            <input type="number" name="buah_mentah" id="buah_mentah" required>
        </div>

        <div class="form-item">
            <label for="tanggal_pengambilan">Tanggal Pengambilan</label>
            <input type="date" name="tanggal_pengambilan" id="tanggal_pengambilan" required>
        </div>

        <div class="form-item">
            <label for="nama_peberondol">Nama Peberondol</label>
            <input type="text" name="nama_peberondol" id="nama_peberondol" required>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
