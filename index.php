<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baumans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-9I76F2HHYq2gNwnPhYJUufVYHgFrbAIXkqFJW/kivPQtJpYykmffmB4YynJzY3tE" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <style>
        
        ::-webkit-scrollbar{
            width: 0;
            background: transparent;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.9);
        }
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .modal-img {
            width: 100%;
            height: auto;
        }
        .close {
            color: #ffffff;
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }
        .card-scroll {
            overflow: hidden;
        }
        footer {
            background-color: #007bff; /* Warna biru */
            color: #fff;

            text-align: center;


        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
        require "function.php";
        $datas = query("SELECT * FROM albumfoto");
    ?>
    <article class="container">
        <div class="judul">
            <h1>Selamat Datang Di Gallery Photo</h1>
        </div>
        <div class="card-wrapper">
            <div class="card-scroll">
                <?php foreach($datas as $key) { ?>
                    <div class="card">
                        <img src="img/<?= $key["foto"] ?>" alt="" width="100%" height="70%" onclick="openModal('img/<?= $key["foto"] ?>')">
                        <span>judul : <?= $key["judul"] ?></span>
                        <span>keterangan : <?= $key["deskripsi"] ?></span>
                        <span>tanggal: 8-02-2024</span>
                        <span><i class="far fa-heart like-icon"></i></span> <!-- Like icon -->
                    </div>
                <?php } ?>             
            </div>
        </div>
    </article>

    <footer>
        <h3>dibuat oleh sena rekayasa perangkat lunak smk baknus 666</h3>
        <a href="login.php">silahkan login untuk menambahkan data</a>
    </footer>

    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

    <script>
        function openModal(imageSrc) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("modalImg");
            modal.style.display = "block";
            modalImg.src = imageSrc;
        }
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>
</body>
</html>
