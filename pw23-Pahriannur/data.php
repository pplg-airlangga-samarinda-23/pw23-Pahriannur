<?php 
require 'koneksi.php';
$sql = "SELECT * FROM [datakebun]";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>[Nama Tabel]</title>
</head>
<body>
    <h1>Halaman [Nama Tabel]</h1>

    <a href="[nama-tabel]-tambah.php">Tambah Data</a>
    <table>
        <thead>
            <th>No</th>
            ...
            <th>Aksi</th>
        </thead>
        <tbody>
            <!-- foreach dengan sintaks alternatif -->
            <?php $no=0; foreach ($rows as $row) : ?>
            <tr>
                <td><?= ++$no ?></td>
                ...
                <td>
                    <a href="[nama-tabel]-edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="[nama-tabel]-hapus.php?id=<?= $row['id'] ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
