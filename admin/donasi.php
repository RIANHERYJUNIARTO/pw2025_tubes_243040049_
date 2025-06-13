<?php 
require 'function.php';
// Mengambil data donasi, diurutkan berdasarkan yang terbaru
$donasi = query("SELECT * FROM donations ORDER BY id DESC"); 
?>
<?php require('pastials/header.php'); ?>
<?php require('pastials/navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Donasi</title>
    <style>
        /* CSS untuk styling gambar di dalam tabel */
        .table-img {
            width: 100px;
            height: 75px;
            object-fit: cover; /* Agar gambar tidak gepeng */
            border-radius: 5px;
        }

        /* Styling khusus untuk header tabel */
        .thead-custom {
            background-color: #495057; /* Warna abu-abu gelap yang lebih modern */
            color: white;
        }
        
        /* Membuat kolom aksi lebih sempit */
        .action-column {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Kelola Data Donasi</h2>
        <a href="tambah.php" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah Data Donasi</a>
        
        <div class="table-responsive"> <table class="table table-striped table-hover table-bordered align-middle text-center">
                <thead class="thead-custom">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Tanggal Dibuat</th>
                        <th class="action-column">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($donasi)) : ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data donasi.</td>
                        </tr>
                    <?php else : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($donasi as $dns) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td class="text-start"><?= htmlspecialchars($dns['username']); ?></td>
                                <td class="text-start"><?= htmlspecialchars($dns['age']); ?></td>
                                <td><img src="../img/<?= htmlspecialchars($dns['photo']); ?>" alt="Foto Donasi" class="table-img"></td>
                                <td><?= date('d M Y, H:i', strtotime($dns['created_at'])); ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= $dns["id"]; ?>" class="btn btn-warning btn-sm" title="Ubah">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="hapus.php?id=<?= $dns["id"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>