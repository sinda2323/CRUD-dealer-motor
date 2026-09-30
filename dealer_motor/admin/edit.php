<?php

session_start();

require_once "../includes/auth.php";

require_once "../config/database.php";

$id = isset($_GET['id'])
    ? (int)$_GET['id']
    : 0;

$query = mysqli_query(
    $conn,
    "SELECT * FROM produk
     WHERE id = $id"
);

$produk = mysqli_fetch_assoc($query);

if (!$produk) {

    die("Motor tidak ditemukan.");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Motor - CV. Jaya Agung Motor</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Data Motor</h1>

        <?php include "../includes/flash.php"; ?>

        <form
            action="proses_produk.php"
            method="POST"
            enctype="multipart/form-data"
        >

            <input
                type="hidden"
                name="aksi"
                value="edit"
            >

            <input
                type="hidden"
                name="id"
                value="<?= $produk['id']; ?>"
            >

            <label>Nama Motor / Tipe</label>

            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($produk['nama']); ?>"
                required
            >

            <label>Kategori</label>

            <select name="kategori" required>

                <option value="Matic"
                    <?= $produk['kategori'] == 'Matic' ? 'selected' : ''; ?>>
                    Matic
                </option>

                <option value="Sport"
                    <?= $produk['kategori'] == 'Sport' ? 'selected' : ''; ?>>
                    Sport
                </option>

                <option value="Bebek"
                    <?= $produk['kategori'] == 'Bebek' ? 'selected' : ''; ?>>
                    Bebek
                </option>

            </select>

            <label>Spesifikasi / Deskripsi</label>

            <textarea
                name="deskripsi"
                rows="5"
                required
            ><?= htmlspecialchars($produk['deskripsi']); ?></textarea>

            <label>Harga</label>

            <input
                type="number"
                name="harga"
                value="<?= $produk['harga']; ?>"
                required
            >

            <label>Stok Unit</label>

            <input
                type="number"
                name="stok"
                value="<?= $produk['stok']; ?>"
                required
            >

            <label>Ganti Gambar Motor</label>

            <input
                type="file"
                name="gambar"
                accept=".jpg,.jpeg,.png,.webp"
            >

            <?php if ($produk['gambar']): ?>

                <p>Gambar saat ini:</p>

                <img
                    src="../uploads/produk/<?= htmlspecialchars($produk['gambar']); ?>"
                    width="150"
                >

            <?php endif; ?>

            <br><br>

            <button
                type="submit"
                class="btn"
            >
                Update Motor
            </button>

            <a
                href="produk.php"
                class="btn"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

</body>

</html>