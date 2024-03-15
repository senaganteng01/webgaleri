<?php
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location:login.php");
    }
    
    require"function.php";
    
    if(isset($_POST["submit"])){
        $judul = $_POST["fJudul"];
        $deskripsi = $_POST["fDeskripsi"];

        $namaFile = $_FILES['fFoto']['name'];
        $ukuranFile = $_FILES['fFoto']['size'];
        $error = $_FILES['fFoto']['error'];
        $tempName=$_FILES['fFoto']['tmp_name'];

        var_dump($error);
        if($error === 4){
            echo "<script>
                    alert('pilih gambar terlebih dahulu!');
                    document.location.href='tambah.php';
                    </script>";
            return false;        
        }

        $ektensiGambarValid = ['jpg','jpeg','png'];
        $ektensiGambar = explode('.',$namaFile);
        $ektensiGambar = strtolower(end($ektensiGambar));
        if(!in_array($ektensiGambar,$ektensiGambarValid)){
            echo"<script>
                    alert('yang anda upload bukan gambar');
                </script>";
            return  false;
        }

        $namaFileBaru= uniqid();
        $namaFileBaru .='.';
        $namaFileBaru .= $ektensiGambar;

        move_uploaded_file($tempName,'img/'.$namaFileBaru);

        $query =  "INSERT INTO albumfoto VALUES('','$namaFileBaru','$judul','$deskripsi')";

        mysqli_query($koneksi,$query);

        if(mysqli_affected_rows($koneksi) >0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href='admin.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href='admin.php';
                </script>
            ";
        }
    }
?>
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

        /* CSS for submit button */
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td> <input type="file" name="fFoto" id="foto" /> </td>
            </tr>
            <tr>
                <td><label for="judul">caption</label></td>
                <td>:</td>
                <td> <input type="text" name="fJudul" id="judul" /> </td>
            </tr>
            <tr>
                <td><label for="deskripsi">Deskripsi</label></td>
                <td>:</td>
                <td> <textarea name="fDeskripsi" id="deskripsi" cols="30" rows="10"></textarea> </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="submit">Tambah Data!</button></td>
            </tr>
        </table>
    </form>
</body>
</html>


