<?php  
require 'koneksi.php';  

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {     
    $id = $_GET['id'];  

    $sql = "SELECT * FROM datakebun WHERE id=?";  
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {    
    $id = $_GET['id'];

    // Pastikan semua data dikirim dengan benar
    $nama_pemanen = $_POST['nama_pemanen'] ?? '';
    $buah_sangat_matang = $_POST['buah_sangat_matang'] ?? '';
    $jumlah_janjang = $_POST['jumlah_janjang'] ?? '';
    $buah_mentah = $_POST['buah_mentah'] ?? '';
    $tanggal_pengambilan = $_POST['tanggal_pengambilan'] ?? '';
    $nama_peberondol = $_POST['nama_peberondol'] ?? '';

    $sql = "UPDATE datakebun SET nama_pemanen=?, buah_sangat_matang=?, jumlah_janjang=?, buah_mentah=?, tanggal_pengambilan=?, nama_peberondol=? WHERE id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("siisssi", $nama_pemanen, $buah_sangat_matang, $jumlah_janjang, $buah_mentah, $tanggal_pengambilan, $nama_peberondol, $id);
    $success = $stmt->execute();

    if ($success) {
        header("Location: data.php");
        exit;
    } else {
        echo "Gagal memperbarui data.";
    }
}  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <title>Edit Data</title>  
</head>  
<body>  
    <h1>Edit Data</h1>  
    <form action="" method="post">  
        <div class="form-item">  
            <label for="nama_pemanen">Nama Pemanen:</label>  
            <input type="text" name="nama_pemanen" id="nama_pemanen" value="<?= htmlspecialchars($row['nama_pemanen'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="buah_sangat_matang">Buah Sangat Matang:</label>  
            <input type="text" name="buah_sangat_matang" id="buah_sangat_matang" value="<?= htmlspecialchars($row['buah_sangat_matang'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="jumlah_janjang">Jumlah Janjang:</label>  
            <input type="text" name="jumlah_janjang" id="jumlah_janjang" value="<?= htmlspecialchars($row['jumlah_janjang'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="buah_mentah">Buah Mentah:</label>  
            <input type="text" name="buah_mentah" id="buah_mentah" value="<?= htmlspecialchars($row['buah_mentah'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="tanggal_pengambilan">Tanggal Pengambilan:</label>  
            <input type="text" name="tanggal_pengambilan" id="tanggal_pengambilan" value="<?= htmlspecialchars($row['tanggal_pengambilan'] ?? '') ?>">  
        </div>  

        <div class="form-item">  
            <label for="nama_peberondol">Nama Peberondol:</label>  
            <input type="text" name="nama_peberondol" id="nama_peberondol" value="<?= htmlspecialchars($row['nama_peberondol'] ?? '') ?>">  
        </div>  

        <button type="submit">Simpan</button>  
    </form>  
</body>  
</html>
