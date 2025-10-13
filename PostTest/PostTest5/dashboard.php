<?php
session_start();

// Jika belum login, redirect ke login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil username dari session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Galeri Foto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Sistem Galeri Foto</h1>
        <nav>
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#galeri">Galeri</a></li>
                <li><a href="#kontak">Kontak</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Konten Utama -->
    <main class="container">
        <!-- Beranda -->
        <section id="beranda">
            <h2>Selamat Datang, <?php echo htmlspecialchars($username); ?> 👋</h2>
            <p>Anda berhasil login ke sistem galeri foto.</p>
        </section>

        <!-- Tentang -->
        <section id="tentang">
            <h2>Tentang</h2>
            <p>Web ini dibuat untuk menampilkan koleksi foto anda.</p>
        </section>

        <!-- 🔹 Bagian Galeri sudah diubah -->
        <section id="galeri">
            <?php include 'crud_foto.php'; ?>
        </section>

        <!-- Kontak -->
        <section id="kontak">
            <h2>Kontak</h2>
            <p>Email: <a href="mailto:info@sistemgalerifotohafizh.com">info@sistemgalerifotohafizh.com</a></p>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Sistem Galeri Foto</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
