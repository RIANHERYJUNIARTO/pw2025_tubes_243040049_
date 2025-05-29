<?php
require 'functions.php';
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

/*if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    */
//     $result = mysqli_query($conn, "SELECT * FROM user WHERE  username = '$username'" );
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
 //cek username
if (mysqli_num_rows($result) === 1) {
//cek password
    $row = mysqli_fetch_assoc($result);
   if ( password_verify($password,$row["password"]));{
    header("location: index.php");
    exit;
   }
 }
    $error = true;

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        label {
            display: block;
            
        }
       
    </style>
</head>
<body>
    <h1>login</h1>
        <?php
        if(isset($error)):
        
        ?>
        <p style="color: red ; font-style :italic"> username / password salah</p>
        <?php
        endif;
        ?>

<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
             <label for="password">Password</label>
            <input type="Password" name="password" id="password">
        </li>
        <li>
             <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </li>
        <button type="submit" name="login">login</button>
    </ul>
</form>

</body>
</html>