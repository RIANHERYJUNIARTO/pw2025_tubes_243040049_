<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: ../login.php");
  exit;
}

require('pastials/header.php');
require('pastials/navbar.php');
require('../functions.php');

// Mengambil data jumlah dari database
$queryregister = mysqli_query($conn, "SELECT * FROM register");
$jumlahregister = mysqli_num_rows($queryregister);

$querydonasi = mysqli_query($conn, "SELECT * FROM donations");
$jumlahdonasi = mysqli_num_rows($querydonasi);

$querykategori = mysqli_query($conn, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($querykategori);

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <style>
    /* CSS yang lebih rapi dan efisien */
    .summary-box {
      display: flex;
    
      align-items: center;
     
      padding: 20px;
      border-radius: 15px;
      color: white;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-decoration: none;
    }

    .summary-box:hover {
      transform: translateY(-5px);
     
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      color: white;
      
    }

    .summary-box .icon {
      font-size: 3.5rem;
     
      margin-right: 20px;
      
      opacity: 0.7;
      
    }

    .summary-box .summary-content h3 {
      margin-bottom: 0;
      font-size: 1.25rem;
      font-weight: 600;
    }

    .summary-box .summary-content p {
      margin-bottom: 0;
      font-size: 2rem;
      font-weight: 700;
    }

    
    .bg-users {
      background-color: #0d6efd;
    }

    
    .bg-donasi {
      background-color: #198754;
    }

    
    .bg-kategori {
      background-color: #ffc107;
    }

    

    .no-decoration {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-house-door-fill"></i> Home</li>
      </ol>
    </nav>
    <h2 class="mb-4">Selamat Datang, Admin!</h2>

    <div class="row">
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="summary-box bg-users">
          <i class="bi bi-people-fill icon"></i>
          <div class="summary-content">
            <h3>Users</h3>
            <p><?php echo $jumlahregister; ?></p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <a href="donasi.php" class="no-decoration">
          <div class="summary-box bg-donasi">
            <i class="bi bi-cash-stack icon"></i>
            <div class="summary-content">
              <h3>Galang Dana</h3>
              <p><?php echo $jumlahdonasi; ?></p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <a href="kategori.php" class="no-decoration">
          <div class="summary-box bg-kategori">
            <i class="bi bi-tags-fill icon"></i>
            <div class="summary-content">
              <h3>Kategori</h3>
              <p><?php echo $jumlahkategori; ?></p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>