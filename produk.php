<?php
require_once "config/database.php";

$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");

include 'includes/header.php'; 
?>

<!-- KONTEN DAFTAR PRODUK -->
<section class="products-section" style="padding: 40px 20px; max-width: 1200px; margin: 0 auto;">
    <div class="container main-content">
        <h2 style="font-family: 'Playfair Display', serif; font-size: 32px; color: #3b2319; margin-bottom: 25px; text-align: center;">Daftar Produk</h2>

        <div class="grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 25px;">
            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                <div class="card" style="background: #ffffff; border-radius: 15px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
                    
                    <div class="image-wrapper" style="width: 100%; height: 200px; border-radius: 10px; overflow: hidden; background: #f9f9f9; margin-bottom: 12px;">
                        <?php if (!empty($row['gambar'])): ?>
                            <img
                                src="uploads/produk/<?= htmlspecialchars($row['gambar']); ?>"
                                class="product-image"
                                alt="<?= htmlspecialchars($row['nama']); ?>"
                                style="width: 100%; height: 100%; object-fit: cover;"
                            >
                        <?php else: ?>
                            <img
                                src="assets/Bakery.jpeg"
                                class="product-image"
                                alt="Default Image"
                                style="width: 100%; height: 100%; object-fit: cover;"
                            >
                        <?php endif; ?>
                    </div>

                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 18px; color: #3b2319; margin: 5px 0;"><?= htmlspecialchars($row['nama']); ?></h3>
                    
                    <?php if (isset($row['harga'])): ?>
                        <p style="font-weight: 600; color: #8c5a3c; margin-top: 5px;">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                    <?php endif; ?>

                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

</div> <!-- Penutup div .hero-card-container -->

<?php include 'includes/footer.php'; ?>