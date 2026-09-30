<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Sweet Cake</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- CSS Proyek Anda (Memanggil style.css dari folder assets) -->
    <link rel="stylesheet" href="../assets/style.css?v=<?= time(); ?>">
</head>

<body class="login-body">

    <div class="login-card">
        <div class="login-header">
            <h2>Login Admin</h2>
            <p>Silakan login untuk masuk ke dashboard pengelola.</p>
        </div>

        <form action="proses_login.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

           <button type="submit" name="login" class="btn-login">Login</button>
        </form>

        <div class="login-footer">
            <p>Belum memiliki akun? <a href="../create_admin.php">Buat Akun</a></p>
        </div>
    </div>
    <script src="../assets/js/login.js"></script>
</body>
</html>