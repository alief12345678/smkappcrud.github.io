<?php
session_start();
include('../config/config.php');

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Periksa apakah ID siswa dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM siswa WHERE id = $id";
    if ($conn->query($query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
} else {
    echo "ID siswa tidak valid!";
    exit();
}
?>
