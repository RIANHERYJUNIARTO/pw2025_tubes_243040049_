<?php
// ----connect database---- //
function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'pw2025_243040049_tubes_');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
//fungsi tambah
function tambah($data)
{
  $conn = koneksi();

  $user = htmlspecialchars($data['username']);
  $age = htmlspecialchars($data['age']);
  $created_at = htmlspecialchars($data['created_at']);
  $id_kategori = htmlspecialchars($data['id_kategori']); 
  $users_id = 1; 


  //upload gambar
  $photo = upload();
  if (!$photo){
    return false;
  }

  $query = "INSERT INTO donations (users_id, username, age, photo, created_at, id_kategori)
            VALUES ($users_id, '$user', '$age', '$photo', '$created_at', $id_kategori)";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
//fungsi upload
function upload() {
    $namafile = $_FILES['photo']['name'];
    $ukuranfile = $_FILES['photo']['size'];
    $error =$_FILES['photo']['error'];
    $tmpname =$_FILES['photo']['tmp_name'];
    
    //cek apakah ada gambar yang diupload
    if($error === 4) {
      echo "<script>
      alert('pilih gambar terlebih dahulu!');
      </script>";
      return false;
    }
    
    // cek apakah yang diupload gambar
    $ekstensigambarvalid = ['jpg', 'jpeg','png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)){
       echo "<script>
        alert('file yang anda upload bukan gambar');
        </script>";
        return false;
    }

    //cek jika ukuran nya terlalu besar
    if($ukuranfile > 2000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }
    
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;
    
    // PERBAIKAN: Gunakan path absolut dari direktori file ini untuk keandalan
    $project_root = dirname(__DIR__); // Ini akan mengarah ke direktori utama proyek
    $target_dir = $project_root . '/img/';

    // Pengecekan direktori
    if (!file_exists($target_dir)) {
        // Coba buat direktori jika tidak ada
        mkdir($target_dir, 0777, true);
    }

    if (!is_writable($target_dir)) {
        echo "<script>alert('Error: Direktori tujuan " . $target_dir . " tidak dapat ditulis (periksa izin folder).');</script>";
        return false;
    }
    
    if (move_uploaded_file($tmpname, $target_dir . $namafilebaru)) {
        return $namafilebaru;
    } else {
        echo "<script>alert('Error: Gagal memindahkan file gambar. Terjadi kesalahan yang tidak diketahui.');</script>";
        return false;
    }
}




function hapus($id) {
  $conn = koneksi();
  // Ambil nama file gambar sebelum menghapus data dari DB
  $data = query("SELECT photo FROM donations WHERE id = $id")[0];
  if ($data && file_exists(dirname(__DIR__) . '/img/' . $data['photo'])) {
      unlink(dirname(__DIR__) . '/img/' . $data['photo']); // Hapus file gambar dari server
  }
  
  mysqli_query($conn, "DELETE FROM donations WHERE id = $id");
  return mysqli_affected_rows($conn);
}


function ubah($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($data['id']);
    $username = htmlspecialchars($data['username']);
    $age = htmlspecialchars($data['age']);
    $photoLama = htmlspecialchars($data['photoLama']); 
    $created_at = htmlspecialchars($data['created_at']);

    if ($_FILES['photo']['error'] === 4) {
        $photo = $photoLama;
    } else {
        $photo = upload();
        if (!$photo) {
            return false; 
        }
        if(file_exists(dirname(__DIR__) . '/img/' . $photoLama)){
            unlink(dirname(__DIR__) . '/img/' . $photoLama);
        }
    }
    
    $query = "UPDATE donations SET
                username = '$username',
                age = '$age',
                photo = '$photo',
                created_at = '$created_at'
              WHERE id = $id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);


}
//mencari kategori
function cari($keyword) {
    $query = "SELECT donations.*, kategori.nama_kategori 
              FROM donations 
              JOIN kategori ON donations.id_kategori = kategori.user_id
              WHERE
              donations.username LIKE '%$keyword%' OR
              kategori.nama_kategori LIKE '%$keyword%'
              ORDER BY donations.created_at DESC";
    return query($query);
}
