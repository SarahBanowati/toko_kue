<?php
// Masukkan semakan session login & koneksi database anda di sini jika ada
require_once "../config/database.php";

// Contoh query jumlah produk & kategori (sesuai dengan database anda)
$query_produk = mysqli_query($conn, "SELECT COUNT(*) as total FROM produk");
$total_produk = mysqli_fetch_assoc($query_produk)['total'] ?? 0;

$query_kategori = mysqli_query($conn, "SELECT COUNT(DISTINCT kategori) as total FROM produk");
$total_kategori = mysqli_fetch_assoc($query_kategori)['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sweet Cake</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&family=Sacramento&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS Proyek Anda -->
    <link rel="stylesheet" href="../assets/style.css?v=<?= time(); ?>">
</head>

<body class="admin-body">

    <!-- NAVIGATION BAR ADMIN -->
    <nav class="admin-navbar">
        <div class="admin-nav-container">
            <a href="index.php" class="admin-brand">Sweet Cake <span>Admin</span></a>
            <div class="admin-menu">
                <a href="index.php" class="active"><i class="fas fa-chart-line"></i> Dashboard</a>
                <a href="produk.php"><i class="fas fa-box"></i> Produk</a>
                <a href="../index.php" target="_blank"><i class="fas fa-globe"></i> Lihat Website</a>
                <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>

    <!-- CONTAINER UTAMA DASHBOARD -->
    <main class="admin-container">
        
        <!-- HEADER DASHBOARD -->
        <div class="admin-header">
            <h2>Dashboard Admin</h2>
            <p>Selamat datang kembali, <strong>Administrator</strong>!</p>
        </div>

        <!-- STATS CARDS (RINGKASAN SIKAP/KAD) -->
        <div class="admin-stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-box-open"></i></div>
                <div class="stat-info">
                    <span class="stat-title">Total Produk</span>
                    <h3 class="stat-value"><?= $total_produk; ?></h3>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-tags"></i></div>
                <div class="stat-info">
                    <span class="stat-title">Total Kategori</span>
                    <h3 class="stat-value"><?= $total_kategori; ?></h3>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon active-icon"><i class="fas fa-check-circle"></i></div>
                <div class="stat-info">
                    <span class="stat-title">Status Sistem</span>
                    <h3 class="stat-value text-success">Aktif</h3>
                </div>
            </div>
        </div>

        <!-- SEKSI MANAJEMEN/MENU PENGELOLAAN -->
        <div class="admin-content-card">
            <div class="content-card-header">
                <h3><i class="fas fa-tasks"></i> Pengurusan Produk</h3>
                <p>Urus katalog produk Sweet Cake seperti menambah, mengemaskini, atau memadam data kue.</p>
            </div>
            <div class="content-card-body">
                <a href="produk.php" class="btn-primary">
                    <i class="fas fa-edit"></i> Urus Produk
                </a>
            </div>
        </div>

    </main>

</body>

</html>