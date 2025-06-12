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

  // PERBAIKAN: Menghapus tanda kutip tunggal di sekitar $users_id and $id_kategori
  $query = "INSERT INTO donations (users_id, username, age, photo, created_at, id_kategori)
            VALUES ($users_id, '$user', '$age', '$photo', '$created_at', $id_kategori)";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

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
    
    // lolos pengecekan, gambar siap di upload
    move_uploaded_file($tmpname, '../img/' . $namafilebaru); // Sebaiknya gunakan nama file baru untuk menghindari duplikasi
    return $namafilebaru;
}

function hapus($id) {
  $conn = koneksi();
  // Ambil nama file gambar sebelum menghapus data dari DB
  $data = query("SELECT photo FROM donations WHERE id = $id")[0];
  if ($data && file_exists('../img/' . $data['photo'])) {
      unlink('../img/' . $data['photo']); // Hapus file gambar dari server
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
    $photoLama = htmlspecialchars($data['photoLama']); // Ambil nama foto lama dari hidden input
    $created_at = htmlspecialchars($data['created_at']);

    // Cek apakah user memilih gambar baru atau tidak
    if ($_FILES['photo']['error'] === 4) {
        // Jika tidak ada gambar baru diunggah, gunakan foto lama
        $photo = $photoLama;
    } else {
        // Jika ada gambar baru, unggah gambar tersebut
        $photo = upload();
        if (!$photo) {
            return false; // Jika upload gagal, hentikan proses
        }
        // Hapus foto lama jika berhasil upload foto baru
        if(file_exists('../img/' . $photoLama)){
            unlink('../img/' . $photoLama);
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
