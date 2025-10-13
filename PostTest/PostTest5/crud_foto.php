<?php
include 'koneksi.php';

// CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['uploadFoto'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $fileName = $_FILES['uploadFoto']['name'];
    $fileTmp = $_FILES['uploadFoto']['tmp_name'];
    $dir = "uploads/";

    if (!is_dir($dir)) mkdir($dir, 0777, true);
    $path = $dir . basename($fileName);

    if (move_uploaded_file($fileTmp, $path)) {
        $sql = "INSERT INTO foto (judul, deskripsi, nama_file) VALUES ('$judul', '$deskripsi', '$path')";
        $conn->query($sql);
    }
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sql = "SELECT nama_file FROM foto WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (file_exists($row['nama_file'])) unlink($row['nama_file']);
    }
    $conn->query("DELETE FROM foto WHERE id=$id");
}

// READ
$fotos = $conn->query("SELECT * FROM foto ORDER BY tanggal_upload DESC");
?>

<section id="galeri">
    <h2>Galeri Foto</h2>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;">
        <?php while ($row = $fotos->fetch_assoc()): ?>
        <article class="card">
            <h3><?= htmlspecialchars($row['judul']) ?></h3>
            <img src="<?= htmlspecialchars($row['nama_file']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>">
            <p><?= htmlspecialchars($row['deskripsi']) ?></p>
            <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus foto ini?')" class="btn btn-primary">Hapus</a>
        </article>
        <?php endwhile; ?>
    </div>

    <section>
        <h3>Tambah Foto</h3>
        <form method="POST" enctype="multipart/form-data" class="card">
            <input type="text" name="judul" placeholder="Judul foto" required>
            <textarea name="deskripsi" placeholder="Deskripsi singkat"></textarea>
            <input type="file" name="uploadFoto" accept="image/*" required>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </section>
</section>
