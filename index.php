<?php 
require_once "config/database.php";

$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC LIMIT 3");

include 'includes/header.php'; 
?>

<section class="hero-banner">
    <div class="hero-content">
        <h1 class="hero-title">
            Made by Ibu <br>
            <span>Cake & Bakery</span>
        </h1>
        
        <p class="hero-description">
            Dibuat dengan kasih sayang Ibu untuk setiap gigitannya. <br>
            Small-batch luxury desserts • Delivered with care
        </p>
        
        <div class="hero-buttons">
            <a href="produk.php" class="btn-primary">Beli Sekarang</a>
        </div>
    </div>

    <div class="hero-image">
        <img src="assets/Bakery.jpeg" alt="Bakery Display" class="cake-img">
    </div>
</section>

</div> 

<section class="katalog-section" style="margin-top: 40px; padding: 40px 20px;">
    
    <h2 style="text-align: center; font-family: 'Playfair Display', serif; font-size: 32px; color: #3b2319; margin-bottom: 30px; text-transform: lowercase;">
        Katalog Produk
    </h2>

    <div class="product-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; max-width: 1000px; margin: 0 auto;">
        <?php if (mysqli_num_rows($query) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                <div class="product-card" style="background: #ffffff; border-radius: 16px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
                    
                    <div class="image-wrapper" style="width: 100%; height: 200px; border-radius: 12px; overflow: hidden; background: #fdfbf7; margin-bottom: 12px;">
                        <?php if (!empty($row['gambar'])): ?>
                            <img
                                src="uploads/produk/<?= htmlspecialchars($row['gambar']); ?>"
                                alt="<?= htmlspecialchars($row['nama']); ?>"
                                style="width: 100%; height: 100%; object-fit: cover;"
                            >
                        <?php else: ?>
                            <img
                                src="assets/Bakery.jpeg"
                                alt="Default Image"
                                style="width: 100%; height: 100%; object-fit: cover;"
                            >
                        <?php endif; ?>
                    </div>

                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 600; color: #3b2319; margin: 5px 0;"><?= htmlspecialchars($row['nama']); ?></h3>
                    
                    <?php if (isset($row['harga'])): ?>
                        <p style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #b85d19; margin: 5px 0 0 0;">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                    <?php endif; ?>

                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="grid-column: 1 / -1; text-align: center; color: #7a685e; font-family: 'Poppins', sans-serif;">Belum ada produk.</p>
        <?php endif; ?>
    </div>

    <div style="max-width: 1000px; margin: 20px auto 0 auto; text-align: right;">
        <a href="produk.php" style="font-family: 'Poppins', sans-serif; font-size: 15px; font-weight: 600; color: #3b2319; text-decoration: underline; text-transform: lowercase;">
            Selengkapnya &rarr;
        </a>
    </div>

</section>

<?php include 'includes/footer.php'; ?>