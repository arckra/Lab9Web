<?php
// Hitung total barang
$q_total = mysqli_query($conn, "SELECT COUNT(*) AS total FROM data_barang");
$total_barang = mysqli_fetch_assoc($q_total)['total'];

// Hitung total stok
$q_stok = mysqli_query($conn, "SELECT SUM(stok) AS total_stok FROM data_barang");
$total_stok = mysqli_fetch_assoc($q_stok)['total_stok'];

// Hitung total kategori
$q_kategori = mysqli_query($conn, "SELECT COUNT(DISTINCT kategori) AS kategori FROM data_barang");
$total_kategori = mysqli_fetch_assoc($q_kategori)['kategori'];
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="dashboard-container">
    
    <h2>Dashboard</h2>
    <p class="subtitle">Ringkasan data barang pada sistem</p>

    <div class="card-wrapper">

        <div class="card blue">
            <h3><?= $total_barang; ?></h3>
            <p>Total Barang</p>
        </div>

        <div class="card green">
            <h3><?= $total_stok; ?></h3>
            <p>Total Stok Barang</p>
        </div>

        <div class="card orange">
            <h3><?= $total_kategori; ?></h3>
            <p>Jenis Kategori</p>
        </div>

    </div>

    <div class="welcome-box">
        <h3>Selamat Datang!</h3>
        <p>Aplikasi ini digunakan untuk mengelola data barang, seperti menambah, mengedit, dan menghapus data.</p>
        <a href="index.php?page=user/list" class="btn-primary">Lihat Data Barang</a>
    </div>

</div>
