<?php

//koneksi database
$conn = mysqli_connect('localhost','root','','pw2025_243040049_tubes_');
 function registrasi($data) {
    global $conn;

   $username = strtolower(trim(stripslashes($data["username"])));
     $password = mysqli_real_escape_string($conn, $data["password"]);
     $password2 = mysqli_real_escape_string($conn,$data["password2"] );
      $email = mysqli_real_escape_string($conn, $data["email"]);

      //cek username sudah ada atau belum
     // $result = mysqli_query($conn,"SELECT username FROM  user WHERE username = '$username'");
      $result = mysqli_query($conn, "SELECT username FROM register WHERE username = '$username'");
      if( mysqli_fetch_assoc($result)) {
        echo "<script> 
        alert('username yang dipilih sudah terdaftar!')
        </script>";
        return false;
      }

     //cek konfirmasi password 
     if($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!')
        </script>";
        return false;
     }

     //enksripsi password
     $password =password_hash($password,PASSWORD_DEFAULT);
     


     //tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO register (username, password, email) VALUES ('$username','$password','$email')");


     return mysqli_affected_rows($conn);
 }











?>