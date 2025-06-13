<?php
require 'functions.php';

// Cek jika form disubmit
if (isset($_POST["register"])) {

    // 1. PERBAIKAN KRITIS: Cara memanggil fungsi yang benar
    if (registrasi($_POST) > 0) {
        echo "<script>
                  alert('User baru berhasil ditambahkan!');
                  document.location.href = 'login.php';
              </script>";
    } else {
        // Menampilkan pesan error dari MySQL jika registrasi gagal
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #f0f2f5; /* Warna latar yang lebih lembut dan modern */
        }
        .card {
            border: 0; /* Menghilangkan border default dari card */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-danger text-white text-center py-3">
                        <h3 class="fw-bold my-2">Buat Akun Baru</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                                <label for="username">Username</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" required>
                                <label for="password2">Konfirmasi Password</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger btn-lg fw-bold" name="register">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <small>Sudah punya akun? <a href="login.php">Login di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>