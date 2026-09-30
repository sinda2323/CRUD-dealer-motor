<?php

require_once "../includes/auth.php";

require_once "../config/database.php";

$total_produk = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total
     FROM produk"
);

$data_produk = mysqli_fetch_assoc(
    $total_produk
);

$total_kategori = mysqli_query(
    $conn,
    "SELECT COUNT(DISTINCT kategori) AS total
     FROM produk"
);

$data_kategori = mysqli_fetch_assoc(
    $total_kategori
);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard Admin - CV. Jaya Agung Motor</title>

    <link
        rel="stylesheet"
        href="../assets/style.css"
    >

</head>

<body>

<div class="navbar">

    <div class="container">

        <a href="index.php">
            Dashboard
        </a>

        <a href="produk.php">
            Kelola Motor
        </a>

        <a href="../index.php">
            Website
        </a>

        <a href="logout.php">
            Logout
        </a>

    </div>

</div>

<div class="container">

    <h1>
        Dashboard Admin CV. Jaya Agung Motor
    </h1>

    <p>
        Selamat datang,
        <strong>
            <?= htmlspecialchars(
                $_SESSION['admin_nama']
            ); ?>
        </strong>
    </p>

    <div class="grid">

        <div class="card">

            <h3>Total Unit Motor</h3>

            <h1>
                <?= $data_produk['total']; ?>
            </h1>

        </div>

        <div class="card">

            <h3>Total Kategori</h3>

            <h1>
                <?= $data_kategori['total']; ?>
            </h1>

        </div>

        <div class="card">

            <h3>Status</h3>

            <h1>Aktif</h1>

        </div>

    </div>

    <div class="card">

        <h2>Manajemen Katalog Motor</h2>

        <p>
            Kelola daftar motor dan stok di CV. Jaya Agung Motor.
        </p>

        <a
            href="produk.php"
            class="btn"
        >
            Kelola Katalog Motor
        </a>

    </div>

</div>

</body>

</html>