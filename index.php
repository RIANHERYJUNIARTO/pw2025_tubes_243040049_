<?php session_start();
require('aset/header.php'); 
 require('aset/navbar.php');
 require('admin/function.php');
 $donation=query("SELECT donations.*, kategori.nama_kategori 
                    FROM donations 
                    JOIN kategori ON donations.id_kategori = kategori.user_id 
                    ORDER BY donations.created_at DESC");  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'inter', sans-serif;
        background-color: #ddd;
    }

    .bagian_awal {
        background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://unsplash.com/s/photos/disaster-recovery')  no-repeat center center;
        background-size: cover;
        color: white;
        padding: 8rem 0;
        text-align: center;
    }
    .bagian_awal h1{
        font-weight: 500;
        font-size: 3.5rem;
    }
    .btn-main{
        
        border-color: red;
        color: green;
        font-weight: 700;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
    }
</style>

<body>
    <header class="bagian_awal">
        <div class="container">

            <h1 class="display-4"> Ayo Peduli Sesama Manusia</h1>
            <p class="lead mb-4">Sumbangkan hartamu Demi kemanusian</p>
            <a href="cari.php" class="btn btn-main">cari penggalangan dana</a>
        </div>
    </header>

  <!-- daftar penggalangan dana  -->
   <section id="daftar-penggalangan">
    <h2 class="text-center mt-3">Daftar penggalangan dana</h2>
    <div class="row">
        <?php if (empty($donation)) : ?>
            <div class="col">
                <div class="alert alert-info text-center" role="alert">
                    Saat ini belum ada program donasi yang tersedia.
                </div>
            </div>
        <?php else : ?>
            <?php foreach ($donation as $donation) : ?>
                <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-sm w-100">
                        <img src="img/<?= htmlspecialchars($donation['photo']); ?>" class="card-img-top" alt="Gambar Donasi" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($donation['username']); ?></h5>
                            <span class="badge bg-success align-self-start mb-2"><?= htmlspecialchars($donation['nama_kategori']); ?></span>
                            <div class="mt-auto">
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Dibuat pada: <?= date('d F Y', strtotime($donation['created_at'])); ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

   </section>
</body>

</html>