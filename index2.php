<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index 2</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index2.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="album.php">Album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="foto.php">Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <a href="profil.php"><img src="assets/pf.png" class="rounded-circle" width="45px" alt="..."></a>
    </nav>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');

        body {
            background-image: url('https://static.pexels.com/photos/414171/pexels-photo-414171.jpeg');
            background-size: cover;
            -webkit-animation: slidein 100s;
            animation: slidein 100s;

            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;

            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;

            -webkit-animation-direction: alternate;
            animation-direction: alternate;
        }

        @-webkit-keyframes slidein {
            from {
                background-position: top;
                background-size: 3000px;
            }

            to {
                background-position: -100px 0px;
                background-size: 2750px;
            }
        }

        @keyframes slidein {
            from {
                background-position: top;
                background-size: 3000px;
            }

            to {
                background-position: -100px 0px;
                background-size: 2750px;
            }

        }



        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(75, 75, 250, 0.3);
            border-radius: 3px;
        }

        .center h1 {
            text-align: center;
            color: white;
            font-family: 'Source Code Pro', monospace;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="">
        <div class="row">
            <?php
            include 'koneksi.php';
            $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE Status='1' or Status='2'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col-md-3">
                    <div class="" style="min-height: 100px;">
                        <a href="zoom.php?ID=<?= $data['FotoID'] ?>">
                        <img src="gambar/<?= $data['LokasiFile'] ?>" class="card-img-top mt-2 rounded-4" width="100px" alt="..."></a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>