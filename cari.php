<?php
session_start();
require 'admin/function.php';

// Cek apakah ada keyword pencarian, jika tidak, array donasi kosong
$donations = [];
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $donations = cari($keyword);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Program Donasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <?php require 'aset/navbar.php'; ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="text-center mb-4">Cari Program Donasi</h1>
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari berdasarkan nama atau kategori..." name="keyword" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>" autofocus>
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <hr class="my-4">

        <!-- Hasil Pencarian -->
        <div class="row">
            <?php if (isset($_GET['keyword'])) : ?>
                <?php if (empty($donations)) : ?>
                    <div class="col">
                        <div class="alert alert-warning text-center" role="alert">
                            Program donasi dengan kata kunci "<b><?= htmlspecialchars($_GET['keyword']); ?></b>" tidak ditemukan.
                        </div>
                    </div>
                <?php else : ?>
                    <h3 class="mb-4">Hasil pencarian untuk: "<?= htmlspecialchars($_GET['keyword']); ?>"</h3>
                    <?php foreach ($donations as $donation) : ?>
                        <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                            <div class="card shadow-sm w-100">
                                <img src="img/<?= htmlspecialchars($donation['photo']); ?>" class="card-img-top" alt="Gambar Donasi" style="height: 250px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= htmlspecialchars($donation['username']); ?></h5>
                                    <span class="badge bg-danger align-self-start mb-2"><?= htmlspecialchars($donation['nama_kategori']); ?></span>
                                    <p class="card-text"> <?= htmlspecialchars($donation['age']); ?> </p>
                                    <div class="mt-auto">
                                        <a href="#" class="btn btn-primary w-100">Lihat Detail</a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Dibuat pada: <?= date('d F Y', strtotime($donation['created_at'])); ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php else : ?>
                <div class="col">
                    <div class="alert alert-info text-center">
                        Silakan masukkan kata kunci untuk memulai pencarian.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
