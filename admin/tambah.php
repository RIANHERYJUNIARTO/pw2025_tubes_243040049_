<?php
session_start();

if(!isset($_SESSION["login"])){
  header("location: ../login.php");
  exit;
}
require 'function.php';
$conn = mysqli_connect("localhost", "root", "", "pw2025_243040049_tubes_");
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
            <h1 class="mb-3 ">Form Tambah Data donasi</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">user</label>
                    <input type="text" class="form-control" id="username" name="username" required autofocus>
                </div>
               
                <div class="mb-3">
                    <label for="email" class="form-label">age</label>
                    <input type="text" class="form-control" id="age" name="age" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" required>
                </div>
               
               
                <div class="mb-3">
                    <label for="gambar" class="form-label">created_at</label>
                    <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
                </div>
                <div class="my-4 d-grid gap-4">
                    <button type="submit" name="submit" class="btn btn-primary">Tambah donasi</button>
                </div>
            </form>
        </div>
    </div>
</div>

