<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: auth/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
</body>
</html>
<body>
    <h2>Dashboard</h2>
    <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
    <a href="siswa/index.php">Kelola Siswa</a>
</body>

<?php include('views/footer.php'); ?>
