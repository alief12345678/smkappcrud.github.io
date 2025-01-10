<?php
session_start();
include('../config/config.php');
include('../views/header.php');

if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Ambil data siswa
$query = "SELECT * FROM siswa";
$result = $conn->query($query);
?>

<h2>Data Siswa</h2>
<a href="tambah.php">Tambah Siswa</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kelas</th>
        <th>No. Telp</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['alamat']; ?></td>
        <td><?php echo $row['kelas']; ?></td>
        <td><?php echo $row['no_telp']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include('../views/footer.php'); ?>
