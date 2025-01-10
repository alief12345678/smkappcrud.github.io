<?php
include('../config/config.php');

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $no_telp = $_POST['no_telp'];

    $query = "INSERT INTO siswa (nama, alamat, kelas, no_telp) VALUES ('$nama', '$alamat', '$kelas', '$no_telp')";
    if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "Gagal menambah data.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="alamat" placeholder="Alamat">
        <input type="text" name="kelas" placeholder="Kelas">
        <input type="text" name="no_telp" placeholder="No. Telp">
        <button type="submit" name="submit">Tambah</button>
    </form>
    
</body>
</html>