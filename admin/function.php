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
 $id_kategori = isset($data['id_kategori']) ? htmlspecialchars($data['id_kategori']) : '1'; // Default ke 1

$users_id = 1;


//upload gambar
$photo = upload();
if (!$photo){
  return false;
}



  $query = "INSERT INTO donations (users_id,username, age, photo , created_at, id_kategori)
          VALUES ($users_id,'$user', '$age','$photo','$created_at', $id_kategori)";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function upload() {
    $namafile = $_FILES['photo'] ['name'];
    $ukuranfile = $_FILES['photo'] ['size'];
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
$ekstensigambar = strtolower( end ($ekstensigambar));
if (!in_array($ekstensigambar,$ekstensigambarvalid)){
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
$namafilebaru =uniqid();
$namafilebaru .='.';
$namafilebaru .= $ekstensigambar;
// lolos pengcekan, gambar siap di upload
move_uploaded_file($tmpname,'../img/'. $namafile);
return $namafile;
}




function hapus($id) {
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM donations WHERE id = $id");

  return mysqli_affected_rows($conn);
}


function ubah($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($data['id']);
    $username = htmlspecialchars($data['username']);
    $age = htmlspecialchars($data['age']);
    $photo = upload($data['photo']);
  
    $created_at = htmlspecialchars($data['created_at']);


    if ($_FILES['photo']['error'] === 4) {
        // Tidak upload gambar baru, gunakan yang lama
        $photo = htmlspecialchars($data['photo']);
    } else {
        // Upload gambar baru
        $photo = upload();
        if (!$photo) {
            return false;
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
