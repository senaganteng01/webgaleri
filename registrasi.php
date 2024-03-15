<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/login2.css">
</head>
<body>
    <?php
        require "function.php";

        if(isset($_POST["submit"])){
            $username= strtolower(stripslashes($_POST["fname"]));
            $email = $_POST["femail"];
            $password = mysqli_real_escape_string($koneksi, $_POST["fpassword"]);
            $rePassword = mysqli_real_escape_string($koneksi, $_POST["frePassword"]);

            $result = mysqli_query($koneksi, "SELECT * FROM akun WHERE username = '$username'");

            if(mysqli_fetch_assoc($result)){
                echo "<script>
                    alert('Username sudah ada, silahkan cari yang lain!');
                    document.location.href='registrasi.php';
                    </script>";
                return false;
            }

            if($password !== $rePassword){
                echo "<script>
                    alert('Password dan repassword harus sama!');
                    document.location.href='registrasi.php';
                    </script>";
                return false;
            };

            $password = password_hash($password, PASSWORD_DEFAULT);

            // Memasukkan data akun baru ke dalam tabel akun
            mysqli_query($koneksi, "INSERT INTO akun VALUES('','$username','$email','$password')");

            if(mysqli_affected_rows($koneksi)){
                // Jika akun berhasil dibuat, buat halaman baru untuk akun tersebut
                $halaman_pengguna = "halaman_pengguna_" . mysqli_insert_id($koneksi);
                $query_halaman = "CREATE TABLE $halaman_pengguna (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    foto VARCHAR(255) NOT NULL,
                    deskripsi TEXT,
                    tanggal_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
                if (mysqli_query($koneksi, $query_halaman)) {
                    echo "<script>
                        alert('Akun berhasil dibuat. Halaman pengguna Anda telah dibuat.');
                        document.location.href='registrasi.php';
                        </script>";
                } else {
                    echo "<script>
                        alert('Akun berhasil dibuat, tetapi halaman pengguna gagal dibuat.');
                        document.location.href='registrasi.php';
                        </script>";
                }
            } else {
                echo "<script>
                    alert('Akun gagal dibuat');
                    document.location.href='registrasi.php';
                    </script>";
            }
        }
    ?>
    <div class="wrap-card">
        <h1>Registrasi di sini</h1>
        <form action="registrasi.php" method="post">
            <div class="card-name">
                <label for="name">Nama</label>
                <input type="text" name="fname" id="name">
            </div>
            <div class="card-name">
                <label for="email">Email</label>
                <input type="text" name="femail" id="email">
            </div>
            <div class="card-name">
                <label for="password">Password</label>
                <input type="password" name="fpassword" id="password">
            </div>
            <div class="card-name">
                <label for="rePassword">Repassword</label>
                <input type="password" name="frePassword" id="rePassword">
            </div>
            <div class="card-name">
                <button type="submit" name="submit">Register</button>
            </div>
        </form>
        <span>Sudah punya akun? <a href="login.php">Silahkan login</a></span>
    </div>
</body>
</html>