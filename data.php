<?php 
require 'koneksi.php';

// Mengambil semua data dari tabel datakebun
$sql = "SELECT * FROM datakebun";
$rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kebun</title>
    <style>
        /* CSS untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e6f7ff;
        }
        a {
            text-decoration: none;
            color: blue;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Data Kebun</h1>

    <a href="tambah.php">Tambah Data</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Pemanen</th>
                <th>Buah Sangat Matang</th>
                <th>Jumlah Janjang</th>
                <th>Buah Mentah</th>
                <th>Tanggal Pengambilan</th>
                <th>Nama Peberondol</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach dengan sintaks alternatif -->
            <?php $no = 1; foreach ($rows as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_pemanen'] ?></td>
                <td><?= $row['buah_sangat_matang'] ?></td>
                <td><?= $row['jumlah_janjang'] ?></td>
                <td><?= $row['buah_mentah'] ?></td>
                <td><?= $row['tanggal_pengambilan'] ?></td>
                <td><?= $row['nama_peberondol'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
