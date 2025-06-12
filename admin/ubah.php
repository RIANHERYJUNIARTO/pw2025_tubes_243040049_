<?php
session_start();

if(!isset($_SESSION["login"])){
  header("location: ../login.php");
  exit;
}

require 'function.php';
$conn = mysqli_connect("localhost", "root", "", "pw2025_243040049_tubes_");
$title = 'Form Tambah Data donasi';
$id = $_GET["id"];
//query data mahasiswa berdasarkan id
$dns =query("SELECT * FROM donations WHERE id = $id")[0];


if (isset($_POST['submit'])) {
//    $username = mysqli_real_escape_string($conn, $_POST["username"]);
// $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
// $message = mysqli_real_escape_string($conn, $_POST["message"]);
// $created_at = mysqli_real_escape_string($conn, $_POST["created_at"]);

// $query = "INSERT INTO donations (username, amount, message, created_at)
//           VALUES ('$username', '$amount', '$message', '$created_at')";


// mysqli_query($conn, $query) ;

    if (ubah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'donasi.php';
          </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah!');
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
            <h1 class="mb-3 ">Ubah data Users</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $dns["id"]; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">user</label>
                    <input type="text" class="form-control" id="username" name="username" required autofocus
                    value="<?=$dns["username"]; ?>">
                </div>
               
                <div class="mb-3">
                    <label for="age" class="form-label">age</label>
                    <input type="text" class="form-control" id="age" name="age" required
                      value="<?=$dns["age"]; ?>">
                </div>
                <div class="mb-3">
                  
                    <label for="photo" class="form-label"></label>
                      <img src="../img/<?= $dns['photo'];?>"width ="500" height="300"  >
                    <input type="file" class="form-control" id="photo" name="photo" required
                     >
                </div>
             
               
                <div class="mb-3">
                    <label for="gambar" class="form-label">created_at</label>
                    <input type="datetime-local" class="form-control" id="created_at" name="created_at" required
                      value="<?=$dns["created_at"]; ?>">
                </div>
                <div class="my-4 d-grid gap-4">
                    <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

