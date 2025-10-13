<?php
session_start();

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Autentikasi sederhana      username : hafizh  password : 123
    if ($username === "hafizh" && $password === "123") {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Galeri Foto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Login Sistem Galeri Foto</h1>
    </header>

    <main class="container">
        <section>
            <h2>Masuk ke Akun</h2>
            <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

            <form action="" method="post" class="card">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Sistem Galeri Foto</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
