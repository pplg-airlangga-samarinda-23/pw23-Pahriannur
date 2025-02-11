<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pastikan ID adalah angka yang valid
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        die("ID tidak valid.");
    }

    $sql = 'DELETE FROM datakebun WHERE id = ?';
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();

        if ($success) {
            header("Location: data.php");
            exit;
        } else {
            echo "Gagal menghapus data.";
        }

        $stmt->close();
    } else {
        echo "Query error.";
    }
}
?>
