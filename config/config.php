<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan username MySQL
$password = ""; // Sesuaikan dengan password MySQL
$dbname = "smk_db"; // Nama database

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
