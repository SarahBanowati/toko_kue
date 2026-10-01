<?php
require_once "../config/database.php";

$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : '';
$kategori = isset($_GET['kategori']) ? trim($_GET['kategori']) : '';

$conditions = [];

if (!empty($keyword)) {
    $conditions[] = "nama LIKE '%" . mysqli_real_escape_string($conn, $keyword) . "%'";
}

if (!empty($kategori)) {
    $conditions[] = "kategori = '" . mysqli_real_escape_string($conn, $kategori) . "'";
}

$whereSQL = "";
if (count($conditions) > 0) {
    $whereSQL = " WHERE " . implode(" AND ", $conditions);
}

$query = mysqli_query($conn, "SELECT * FROM produk" . $whereSQL . " ORDER BY id DESC");
$query_kategori = mysqli_query($conn, "SELECT DISTINCT kategori FROM produk WHERE kategori IS NOT NULL AND kategori != ''");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Made by Ibu Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/style.css?v=<?= time(); ?>">
</head>

<body class="admin-body">

    <nav class="admin-navbar">
        <div class="admin-nav-container">
            <a href="index.php" class="admin-brand">Sweet Cake <span>Admin</span></a>
            <div class="admin-menu">
                <a href="index.php"><i class="fas fa-chart-line"></i> Dashboard</a>
                <a href="produk.php" class="active"><i class="fas fa-box"></i> Produk</a>
                <a href="../index.php" target="_blank"><i class="fas fa-globe"></i> Lihat Website</a>
                <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>

    <main class="admin-container">
        
        <div class="admin-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
            <div>
                <h2>Kelola Produk</h2>
                <p>Tambah, edit, cari, atau hapus katalog kue Sweet Cake.</p>
            </div>
            <a href="tambah.php" class="btn-primary">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>

        <div class="admin-content-card">
            
            <form action="produk.php" method="GET">
                <label style="font-weight: 500; font-size: 13px;">Cari Produk:</label>
                <input type="text" name="cari" placeholder="Masukkan nama produk..." value="<?= htmlspecialchars($keyword); ?>">

                <label style="font-weight: 500; font-size: 13px; margin-left: 10px;">Kategori:</label>
                <select name="kategori">
                    <option value="">Semua Kategori</option>
                    <?php while ($kat = mysqli_fetch_assoc($query_kategori)): ?>
                        <option value="<?= htmlspecialchars($kat['kategori']); ?>" <?= ($kategori == $kat['kategori']) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($kat['kategori']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-search"></i> Cari
                </button>
                <a href="produk.php" class="btn-secondary">Reset</a>
            </form>

            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 80px;">Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th style="width: 70px;">Stok</th>
                        <th style="width: 130px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if (mysqli_num_rows($query) > 0):
                        while ($row = mysqli_fetch_assoc($query)): 
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?php if (!empty($row['gambar'])): ?>
                                <img src="../uploads/produk/<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['nama']); ?>">
                            <?php else: ?>
                                <span style="font-size: 11px; color: #888;">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><strong><?= htmlspecialchars($row['nama']); ?></strong></td>
                        <td><?= htmlspecialchars($row['kategori']); ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td style="text-align: center;">
                            <a href="edit.php?id=<?= $row['id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    else:
                    ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 25px; color: #888;">
                            Data produk tidak ditemukan.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>

    </main>

</body>

</html>