<?php
session_start();
include('../config/config.php');

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Ambil ID siswa dari parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM siswa WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $siswa = $result->fetch_assoc();
    } else {
        echo "Data siswa tidak ditemukan!";
        exit();
    }
} else {
    echo "ID siswa tidak valid!";
    exit();
}

// Proses update data siswa
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $no_telp = $_POST['no_telp'];

    $query = "UPDATE siswa SET nama='$nama', alamat='$alamat', kelas='$kelas', no_telp='$no_telp' WHERE id=$id";
    
    if ($conn->query($query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
    <?php include('../views/header.php'); ?>
    
    <h2>Edit Data Siswa</h2>
    <form method="POST">
        <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $siswa['nama']; ?>" required>
    
    <label>Alamat:</label>
    <input type="text" name="alamat" value="<?php echo $siswa['alamat']; ?>">
    
    <label>Kelas:</label>
    <input type="text" name="kelas" value="<?php echo $siswa['kelas']; ?>">
    
    <label>No. Telp:</label>
    <input type="text" name="no_telp" value="<?php echo $siswa['no_telp']; ?>">
    
    <button type="submit" name="update">Update</button>
</form>

<a href="index.php">Kembali</a>

<?php include('../views/footer.php'); ?>
</body>
</html>
