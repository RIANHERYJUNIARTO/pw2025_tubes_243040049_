<?php require 'function.php';
$donasi = query ("SELECT * FROM donations"); ?>
<?php require('pastials/header.php'); ?>
<?php require('pastials/navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
     <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data donasi</a>
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>user</th>
            <th>campaign</th>
            <th>amount</th>
            <th>massage</th>
            <th>is anonymous</th>
            <th>created_at</th>
            <th>aksi</th>

        </tr>
        <tbody>
            <?php $i = 1;
            foreach ($donasi as $dns) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $dns['user']; ?></td>
                    <td><?= $dns['campaign']; ?></td>
                    <td><?= $dns['amount']; ?></td>
                    <td><?= $dns['massage']; ?></td>
                    <td><?= $dns['is_anonymous']; ?></td>
                    <td><?= $dns['created_at']; ?></td>
                   
                  
                    <td>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="hapus.php?id=<?= $dns['id']; ?>" onclick="return confirm('Yakin?');" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
    
    </tbody>


    </table>






</body>

</html>