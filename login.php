<?php
session_start();
//if(isset($_SESSION["login"])) {
    
//    header("location:admin/dasboard_admin.php ");
    //exit;
//}
if (isset($_SESSION["login"])) {
    if ($_SESSION['role'] == 'admin') {
        // PERBAIKAN PATH: Naik 1 level ke index.php di admin_panel
        header("Location: admin/dasboard_admin.php");
    } else {
        // PERBAIKAN PATH: Naik 2 level ke halaman_user
        header("Location: index.php");
        
    }
    exit;
}


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
    $result = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username'");
    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])); {
            //set session
            // $_SESSION["login"] = true;

            // header("location:admin/dasboard_admin.php");
            // exit;
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];

            // === LOGIKA PENGALIHAN BERDASARKAN ROLE ===
            if ($row["role"] == 'admin') {
                // PERBAIKAN PATH: Naik 1 level ke index.php di admin_panel
                header("Location: admin/dasboard_admin.php");
                exit;
            } else {
                // PERBAIKAN PATH: Naik 2 level ke halaman_user
                header("Location: index.php");
                exit;
            }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          

        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #ddd;

        }

        .wrapper {
            width: 420px;
            background:rgb(200,67,10) ;
            border: 2px solid rgba(255,255,255,.2);
            color: #fff;
            border-radius: 15px;
            padding: 30px 40px;


        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
        }

        .wrapper .input-box {
            width: 95%;
            height: 60%;
            
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, 2);
           border-radius: 15px;
           font-size: 16px;
           color: #fff;
           padding: 5px;


        }
        .input-box input::username{
            color: #fff;
        }
        button{
            align-items: center;
            width: 95%;
            height: 30px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            margin-top: 10px;
        }
        button .login{

        } 
        p {
            

        }
        label {
            display: block;


        }
    </style>
</head>

<body>


    <?php
    if (isset($error)):

    ?>
        <p style="color: red ; font-style :italic"> username / password salah</p>
    <?php
    endif;
    ?>
    <div class="wrapper">
        <h1>login</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <div class="input-box">

                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                </li>
                <li>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="Password" name="password" id="password">
                    </div>
                </li>
                <li>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                </li>
                <button type="submit" name="login">login</button>
            </ul>
        </form>
        <div class="text-center mt-3">
                            <small>Belum punya akun? <a href="registrasi.php" class="text-success fw-bold">Daftar di sini</a></small>
                    </div>
    </div>
</body>

</html>