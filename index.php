<?php
session_start();
require('aset/header.php');
require('aset/navbar.php');
require('admin/function.php');

// Query untuk mengambil data donasi
// INI PERBAIKANNYA
$donation = query("SELECT donations.*, kategori.nama_kategori 
                   FROM donations 
                   JOIN kategori ON donations.id_kategori = kategori.user_id 
                   ORDER BY donations.created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi</title> <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Warna latar yang lebih lembut */
        }

        .bagian_awal {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/foto donation.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 10rem 1.5rem; 
            text-align: center;
        }

        .bagian_awal h1 {
            font-weight: 500;
            font-size: 3rem;
        }

        .btn-main {
            background-color: orangered;
            border-color: orangered; /* Sesuaikan border color */
            color: #fff;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 8px; /* Sedikit lebih halus */
            transition: background-color 0.3s, border-color 0.3s;
        }
        
        .btn-main:hover {
            background-color: #e63e00;
            border-color: #e63e00;
            color: #fff;
        }

        /* Perubahan disini: Mengatur section penggalangan dana */
        #daftar-penggalangan {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        /* Perubahan disini: CSS untuk kartu agar lebih rapi */
        .card {
            border: none; /* Hilangkan border default */
            border-radius: 15px; /* Radius lebih besar agar lebih modern */
            overflow: hidden; /* Penting agar gambar mengikuti border-radius */
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%; /* Pastikan kartu mengisi ruang kolom */
        }

        .card:hover {
            transform: translateY(-5px); /* Efek sedikit terangkat saat hover */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
        }

        .card-img-wrapper {
             /* Perubahan disini: Bungkus gambar agar tidak mepet */
            padding: 10px; /* Memberi jarak antara border kartu dengan gambar */
            background-color: #fff;
        }

        .card-img-top {
            width: 100%;
            height: 220px; /* Tinggi gambar dibuat konsisten */
            object-fit: cover;
            border-radius: 10px; /* Beri radius juga pada gambar */
        }
        
        .card-body {
             /* Pastikan card-body mengisi sisa ruang */
            display: flex;
            flex-direction: column;
        }
        
        .card-title {
            font-size: 1.25rem; /* Ukuran judul kartu */
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .card-footer {
            background-color: #fff;
            border-top: 1px solid #eee;
        }

    </style>
</head>

<body>
    <header class="bagian_awal">
        <div class="container">
            <h1 class="display-4">Ayo Peduli Sesama Manusia</h1>
            <p class="lead mb-4">Sumbangkan hartamu demi kemanusiaan</p>
            <a href="cari.php" class="btn btn-main btn-lg">Cari Penggalangan Dana</a>
        </div>
    </header>

    <section id="daftar-penggalangan">
        <div class="container">
            <h2 class="text-center mb-5">Daftar Penggalangan Dana</h2> <div class="row">
                <?php if (empty($donation)) : ?>
                    <div class="col">
                        <div class="alert alert-info text-center" role="alert">
                            Saat ini belum ada program donasi yang tersedia.
                        </div>
                    </div>
                <?php else : ?>
                    <?php foreach ($donation as $item) : ?> <div class="col-lg-4 col-md-6 mb-4">
                             <div class="card shadow-sm">
                                <div class="card-img-wrapper">
                                    <img src="img/<?= htmlspecialchars($item['photo']); ?>" class="card-img-top" alt="Gambar Donasi">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><?= htmlspecialchars($item['username']); ?></h3>
                                    <span class="badge bg-danger mb-3"><?= htmlspecialchars($item['nama_kategori']); ?></span>
                                    
                                    <p class="card-text text-muted">Target: <?= htmlspecialchars($item['age']); // Asumsi 'age' adalah target dana, ganti jika salah ?></p>
                                    
                                    <div class="mt-auto"></div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Dibuat pada: <?= date('d F Y', strtotime($item['created_at'])); ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php require('aset/footer.php'); // Sebaiknya ada footer ?>
    
    </body>

</html>