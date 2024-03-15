<?php 
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location:login.php");
    }

    require"function.php";
    $datas= query("SELECT * FROM albumfoto");

    
?>
<style>
    .button-delete, .button-update {
    display: inline-block;
    padding: 8px 12px;
    margin-right: 5px;
    text-decoration: none;
    color: #fff;
    background-color: #dc3545; 
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.button-update {
    background-color: #007bff; 
}

.button-delete:hover, .button-update:hover {
    background-color: #c82333; 
}

.button-update:hover {
    background-color: #0056b3; 
}

body {
            background-image: url('https://img.freepik.com/free-vector/blue-curve-background_53876-113112.jpg?w=740&t=st=1709700945~exp=1709701545~hmac=f8521e1db6d38d538514348433ca99821a2753853118f3765462b832b9aa6b8e');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
   <div class="wrap-card">
    <h1> Album Foto sena</h1>
    <span>
        <a href="tambah.php">Tambah Data</a> 
        <a href="index.php">Home</a>
        <a href="logout.php">Log Out</a>
    </span>
    <table  >
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php    $i=1; ?>
            <?php foreach($datas as $key){ ?>
                <tr>
                    <td> <?= $i; ?> </td>
                    <td><img src="img/<?= $key["foto"]; ?> " width="100px"></td>
                    <td><?= $key["judul"]; ?></td>
                    <td><?= $key["deskripsi"]; ?></td>
                    <td>
                    <a href="hapus.php?id=<?= $key["id"] ?>" class="button-delete" onclick="return confirm('yakin?')">Hapus</a>
                    <a href="update.php?id=<?= $key["id"] ?>" class="button-update">Ubah</a>
                 </td>

                </tr>
            <?php  $i++; ?>  
            <?php }; ?>
        </tbody>
    </table>
    </div>
</body>
</html>