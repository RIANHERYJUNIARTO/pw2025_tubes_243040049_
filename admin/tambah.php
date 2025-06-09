<?php
require 'function.php';
$title = 'Form Tambah Data donasi';

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'donasi.php';
          </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'tambah.php';
          </script>";
    }
}
?>

<?php require('pastials/header.php'); ?>

<?php require('pastials/navbar.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-3">Form Tambah Data donasi</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">user</label>
                    <input type="text" class="form-control" id="user" name="user" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">campaign</label>
                    <input type="text" class="form-control" id="campaign" name="campaign" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" required>
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">massage</label>
                    <input type="text" class="form-control" id="massage" name="massage" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">is_anonymous</label>
                    <input type="text" class="form-control" id="is_anonymous" name="is_anonymous" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">created_at</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" required>
                </div>
                <div class="my-4 d-grid gap-4">
                    <button type="submit" name="submit" class="btn btn-primary">Tambah donasi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('partials/footer.php'); ?>