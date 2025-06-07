<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if ("registrasi"($_POST) > 0) {
        echo "<script>
                    alert('user baru berhasil di tambahkan!');
                </script>";
    } else {
        echo mysqli_error($conn);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #ddd;


        }

        .body-log {
            color: #fff;
            

        }

        .wrapper {
            position: relative;
            width: 400px;
            height: 50px;
            background: rgb(200, 67, 10);
            border-radius: 10px;
            padding: 20px;





        }



        label {
            display: block;
            align-items: center;
        }
    </style>
</head>

<body>


    <form action="" method="post">
        <ul>
            <div class="body-log">
                <h1>Halaman Registrasi</h1>

                <li>
                    <div class="wrapper">


                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                </li>
                <li>
                    <div class="wrapper">
                        <label for="password">Pasword</label>
                        <input type="password" name="password" id="password">
                    </div>
                </li>
                <li>
                    <div class="wrapper">
                        <label for="password2"> konfirmasi Pasword</label>
                        <input type="password" name="password2" id="password2">
                    </div>
                </li>
                <li>
                    <div class="wrapper">
                        <label for="Email"> Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                </li>

                <li>
                    <button type="submit" name="register">Sokin

                    </button>
                </li>
            </div>


        </ul>
    </form>
</body>

</html>