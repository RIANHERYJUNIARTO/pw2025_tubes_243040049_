<?php
session_start();

if(!isset($_SESSION["login"])){
  header("location: ../login.php");
  exit;
}

?><?php require('pastials/header.php'); ?>

<?php require('pastials/navbar.php'); ?>
<?php require('../functions.php');
$queryregister = mysqli_query( $conn, "SELECT * FROM register");
$jumlahregister = mysqli_num_rows($queryregister);

$querydonasi = mysqli_query( $conn, "SELECT * FROM donations");
$jumlahdonasi = mysqli_num_rows($querydonasi);

$querykategori = mysqli_query( $conn, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($querykategori);


?>


<!doctype html>
<html lang="en">


<style>
  .kotak {
    border: solid;
  }

  .summary-kategori {
    background: rgb(175, 8, 8);
    border-radius: 10px;
  }

  .icon {
    font-size: 5rem;
  }

  .no-decoration {
    text-decoration: none;
  }

  .summary-produk {
    background-color: rgb(145, 127, 127);
    border-radius: 10px;
  }

  .no-decoration:hover {
    color: blue;
  }
</style>

<body>
  

  <div class="container mt-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-house "></i>Home</li>
      </ol>
    </nav>
    <h1>Hallo Admin!</h1>

    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-12 mb-3 ">
          <div class="summary-kategori p-1">
            <div class="row">
              <div class="col-6">
                <i class="bi bi-people-fill icon text-black-50"></i>
              </div>
              <div class="col-6 text-white">
                <h3>Users</h3>
                <p class="fs-4"> <?php echo $jumlahregister;?> </p>
                <p><a href="dasboard_data_users.php" class="text-white no-decoration">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12  mb-3">
          <div class="summary-produk p-1">
            <div class="row">
              <div class="col-6">
                <i class="bi bi-cash icon text-black-60"></i>
              </div>
              <div class="col-6 text-white">
                <h3>Galang Dana</h3>
                <p class="fs-4"> <?php echo$jumlahdonasi; ?> </p>
                <p><a href="dasboard_data_users.php" class="text-white no-decoration">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="col-lg-4 col-md-6 col-12  mb-3">
          <div class="summary-produk p-1">
            <div class="row">
              <div class="col-6">
                <i class="bi bi-cash icon text-black-60"></i>
              </div>
              <div class="col-6 text-white">
                <h3>KATEGORI</h3>
                <p class="fs-4"> <?php echo$jumlahkategori; ?> </p>
                <p><a href="dasboard_data_users.php" class="text-white no-decoration">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>