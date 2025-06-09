<?php
// ----connect database---- //
function koneksi()
{
    $conn = mysqli_connect('localhost', 'root','','pw2025_243040049_tubes_');
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

  $user = htmlspecialchars($data['user']);
  $campaign = htmlspecialchars($data['campaign']);
  $amount = htmlspecialchars($data['amount']);
  $massage = htmlspecialchars($data['massage']);
  $anonymous = htmlspecialchars($data['is_anonymous']);
  $created_at = htmlspecialchars($data['created_at']);

   $query = "INSERT INTO donations
              VALUES
            (null, '$user', '$campaign', '$amount', '$massage', '$anonymous','$created_at')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

?>
