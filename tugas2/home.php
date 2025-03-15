<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

// Cek input umur
$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];

    if ($umur >= 18) {
        $hasil = "Halo, $nama. Anda termasuk <b>Dewasa</b>.";
    } else {
        $hasil = "Halo, $nama. Anda termasuk <b>Belum Dewasa</b>.";
    }
    
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Input Umur</h2>
        <p>Selamat datang, <b><?php echo $_SESSION["username"]; ?></b>!</p>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Umur:</label>
                <input type="number" name="umur" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if ($hasil): ?>
            <div class="alert alert-info mt-3"><?php echo $hasil; ?></div>
        <?php endif; ?>

        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
<?php

