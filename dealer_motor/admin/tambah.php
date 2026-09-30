<?php

session_start();

require_once "../includes/auth.php";

?>

<!DOCTYPE html>
<html>

<head>

    <title>Tambah Motor - CV. Jaya Agung Motor</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="navbar">

    <div class="container">

        <a href="index.php">Dashboard</a>
        <a href="produk.php">Kelola Motor</a>

    </div>

</div>

<div class="container">

    <div class="card">

        <h1>Tambah Motor Baru</h1>

        <form
            action="proses_produk.php"
            method="POST"
            enctype="multipart/form-data"
        >

            <input
                type="hidden"
                name="aksi"
                value="tambah"
            >

            <label>Nama Motor / Tipe</label>

            <input
                type="text"
                name="nama"
                placeholder="Contoh: Honda Beat CBS, Yamaha NMax"
                required
            >

            <label>Kategori</label>

            <select name="kategori" required>

                <option value="">
                    Pilih kategori
                </option>

                <option value="Matic">
                    Matic
                </option>

                <option value="Sport">
                    Sport
                </option>

                <option value="Bebek">
                    Bebek
                </option>

            </select>

            <label>Spesifikasi / Deskripsi</label>

            <textarea
                name="deskripsi"
                rows="5"
                placeholder="Masukkan spesifikasi motor..."
                required
            ></textarea>

            <label>Harga</label>

            <input
                type="number"
                name="harga"
                min="0"
                required
            >

            <label>Stok Unit</label>

            <input
                type="number"
                name="stok"
                min="0"
                required
            >

            <label>Gambar Motor</label>

            <input
                type="file"
                name="gambar"
                accept=".jpg,.jpeg,.png,.webp"
            >

            <br>

            <button
                type="submit"
                class="btn"
            >
                Simpan Motor
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