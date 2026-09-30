<?php
require_once "config/database.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM produk
     ORDER BY id DESC
     LIMIT 6"
);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Made by Ibu - Toko Kue</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&family=Sacramento&display=swap" rel="stylesheet">

    <!-- CSS Proyek Anda (Ditambahkan timestamp agar otomatis refresh CSS) -->
    <link rel="stylesheet" href="assets/style.css?v=<?= time(); ?>">
</head>

<body>

    <!-- HERO CARD CONTAINER (HEADER ATAS) -->
    <div class="hero-card-container">
        
        <!-- NAVBAR -->
        <header class="navbar">
            <div class="logo">
                <a href="index.php">Made by Ibu</a>
            </div>
            
            <nav class="nav-menu">
                <a href="index.php">Beranda</a>
                <span class="dot">•</span>
                <a href="produk.php">Produk</a>
                <span class="dot">•</span>
                <a href="tentang.php">Tentang Kami</a>
            </nav>
            
            <div class="nav-action">
                <a href="produk.php" class="btn-order">Order Now</a>
            </div>
        </header>

        <!-- HERO BANNER -->
        <section class="hero-banner">
            <div class="hero-content">
                <h1 class="hero-title">
                    Cake and <br>
                    <span> Bakery</span>
                </h1>
                
                <p class="hero-description">
                    Kue lezat untuk setiap momen spesial. <br>
                    Small-batch luxury desserts • Delivered with care
                </p>
                
                <div class="hero-buttons">
                    <a href="produk.php" class="btn-primary">Shop Now</a>
                    <a href="tentang.php" class="btn-secondary">Explore Collection</a>
                </div>
            </div>

            <div class="hero-image">
                <img src="assets/hero-cake.png" alt="Sweet Cake Banner" class="cake-img">
            </div>
        </section>

    </div>

    <!-- SEKSI PRODUK TERBARU (DI BAWAH HEADER) -->
    <section class="products-section">
        <div class="container main-content">
            <h2>Produk Terbaru</h2>

            <div class="grid">
                <?php while ($row = mysqli_fetch_assoc($query)): ?>
                <div class="card">
                    <?php if ($row['gambar']): ?>
                        <img
                            src="uploads/produk/<?= htmlspecialchars($row['gambar']); ?>"
                            class="product-image"
                            alt="<?= htmlspecialchars($row['nama']); ?>"
                        >
                    <?php endif; ?>

                    <h3><?= htmlspecialchars($row['nama']); ?></h3>
                    <p class="kategori"><?= htmlspecialchars($row['kategori']); ?></p>
                    <strong class="harga">
                        Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                    </strong>

                    <div style="margin-top: 15px;">
                        <a href="detail.php?id=<?= $row['id']; ?>" class="btn-detail">Detail</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

</body>

<!-- FOOTER SECTION -->
    <footer class="site-footer">
        <div class="footer-container">
            <!-- Kolom 1: About & Logo -->
            <div class="footer-col brand-col">
                <h3 class="footer-logo">Sweet Cake</h3>
                <p class="footer-desc">
                    Menyajikan aneka kue dan pastry lezat dengan bahan berkualitas tinggi untuk melengkapi momen spesial Anda.
                </p>
                <div class="social-links">
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Navigasi Cepat -->
            <div class="footer-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="tentang.php">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Jam Buka -->
            <div class="footer-col">
                <h4>Jam Operasional</h4>
                <p>Senin - Jumat: 08.00 - 20.00</p>
                <p>Sabtu - Minggu: 09.00 - 21.00</p>
            </div>

            <!-- Kolom 4: Kontak -->
            <div class="footer-col">
                <h4>Hubungi Kami</h4>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Raya Mawar No. 123</p>
                <p><i class="fas fa-phone-alt"></i> +62 812-3456-7890</p>
                <p><i class="fas fa-envelope"></i> hello@sweetcake.com</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?= date('Y'); ?> Sweet Cake. All rights reserved.</p>
        </div>
    </footer>

    </html>