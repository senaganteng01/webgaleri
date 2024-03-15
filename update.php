<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit(); 
}

require "function.php";

// Periksa apakah id sesuai dengan format yang diharapkan
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    echo "Invalid ID";
    exit();
}

$id = $_GET["id"];

$stmt = $koneksi->prepare("SELECT * FROM albumfoto WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    echo "Album not found";
    exit();
}

if (isset($_POST["ubah"])) {
    $id = $_POST["fid"];
    $judul = $_POST["fJudul"];
    $deskripsi = $_POST["fDeskripsi"];
    $fotoLama = $_POST["fFoto"];
    $foto = $fotoLama;

    if ($_FILES['fFoto']['error'] !== 4) { 
        $namaFile = $_FILES['fFoto']['name'];
        $tempName = $_FILES['fFoto']['tmp_name'];

        $validImageTypes = ['image/jpeg', 'image/png'];
        $detectedType = mime_content_type($tempName);
        if (!in_array($detectedType, $validImageTypes)) {
            echo "<script>alert('Invalid image format');</script>";
            exit();
        }

        $namaFileBaru = uniqid() . '.' . pathinfo($namaFile, PATHINFO_EXTENSION);
        if (!move_uploaded_file($tempName, 'img/' . $namaFileBaru)) {
            echo "<script>alert('Failed to upload image');</script>";
            exit();
        }
        $foto = $namaFileBaru;
    }

    $stmt = $koneksi->prepare("UPDATE albumfoto SET foto=?, judul=?, deskripsi=? WHERE id=?");
    $stmt->bind_param("sssi", $foto, $judul, $deskripsi, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Data berhasil diubah!');</script>";
        header("Location: admin.php"); // Arahkan ke halaman admin setelah berhasil mengubah data
        exit();
    } else {
        echo "<script>alert('Data gagal diubah!');</script>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Album</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/free-vector/cerulean-blue-curve-frame-template_53876-99029.jpg?w=740&t=st=1709691045~exp=1709691645~hmac=9f632ef68ce8a47377877050259f58954c8c5e88fc0218ac84ddbb793d8fa4bd');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif; 
            color: white; 
            padding: 20px; 
        }

        form {
            background: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 10px;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.7); 
        }

        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fid" value="<?= $data["id"] ?>">
        <input type="hidden" name="fFoto" value="<?= $data["foto"] ?>">

        <table>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td> <input type="file" name="fFoto" id="foto" /> </td>
            </tr>
            <tr>
                <td><label for="judul">Judul</label></td>
                <td>:</td>
                <td> <input type="text" name="fJudul" id="judul" value="<?= $data["judul"] ?>" /> </td>
            </tr>
            <tr>
                <td><label for="deskripsi">Deskripsi</label></td>
                <td>:</td>
                <td> 
                    <textarea name="fDeskripsi" id="deskripsi" cols="30" rows="10"><?= $data["deskripsi"] ?></textarea> 
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="ubah">Ubah Data</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
