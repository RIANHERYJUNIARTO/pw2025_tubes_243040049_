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

$users_id = 1;



  $query = "INSERT INTO donations (users_id,username, age, created_at)
          VALUES ($users_id,'$user', '$age','$created_at')";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
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
  
    $created_at = htmlspecialchars($data['created_at']);

    $query = "UPDATE donations SET
                username = '$username',
                age = '$age',
               
                created_at = '$created_at'
              WHERE id = $id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
