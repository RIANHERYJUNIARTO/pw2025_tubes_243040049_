<?php session_start();
require('aset/header.php'); 
 require('aset/navbar.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'inter', sans-serif;
        background-color: #ddd;
    }

    .bagian_awal {
        background: black;
        background-size: cover;
        color: white;
        padding: 8rem 0;
        text-align: center;
    }
    .bagian_awal h1{
        font-weight: 500;
        font-size: 3.5rem;
    }
    .btn-main{
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
        border-color: red;
        color: green;
        font-weight: 700;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
    }
</style>

<body>
    <header class="bagian_awal">
        <div class="container">

            <h1 class="display-4"> Ayo Peduli Sesama Manusia</h1>
            <p class="lead mb-4">Sumbangkan hartamu Demi kemanusian</p>
            <a href="cari.php" class="btn btn-main">cari penggalangan dana</a>
        </div>
    </header>
</body>

</html>