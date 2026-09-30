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
<html>

<head>

    <title>CV. Jaya Agung Motor - Dealer & Showroom Motor Terbaik</title>

    <link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="navbar">

    <div class="container">

        <a href="index.php">
            <strong>CV. Jaya Agung Motor</strong>
        </a>

        <a href="produk.php">
            Katalog Motor
        </a>

        <a href="tentang.php">
            Tentang Kami
        </a>

    </div>

</div>

<section class="hero">

    <div class="container">

        <h1>
            CV. Jaya Agung Motor
        </h1>

        <p>
            Pilihan motor berkualitas dan terpercaya untuk mobilitas Anda.
        </p>

        <a
            href="produk.php"
            class="btn"
        >
            Lihat Katalog Motor
        </a>

    </div>

</section>

<div class="container">

    <h2>Motor Terbaru</h2>

    <div class="grid">

        <?php while ($row = mysqli_fetch_assoc($query)): ?>

        <div class="card">

            <?php if ($row['gambar']): ?>

                <img
                    src="uploads/produk/<?= htmlspecialchars($row['gambar']); ?>"
                    class="product-image"
                >

            <?php endif; ?>

            <h3>
                <?= htmlspecialchars($row['nama']); ?>
            </h3>

            <p>
                <?= htmlspecialchars($row['kategori']); ?>
            </p>

            <strong>
                Rp <?= number_format(
                    $row['harga'],
                    0,
                    ',',
                    '.'
                ); ?>
            </strong>

            <br><br>

            <a
                href="detail.php?id=<?= $row['id']; ?>"
                class="btn"
            >
                Lihat Detail
            </a>

        </div>

        <?php endwhile; ?>

    </div>

</div>

</body>

</html>