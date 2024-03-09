<?php
session_start();
$ID = $_GET['ID'];
?>

<head>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index2.php">Beranda</a>
                    <a class="nav-link" href="album.php">Album</a>
                    <a class="nav-link" href="foto.php">Foto</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

</head>

<body>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php
    include "koneksi.php";
    $sql = mysqli_query($koneksi, "SELECT * FROM foto,user WHERE FotoID=$ID");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <div class="container mt-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-7">
                        <a href="gambar/<?= $data['LokasiFile'] ?>" class="">
                            <img src="gambar/<?= $data['LokasiFile'] ?>" alt="..." width=700px;>
                        </a>
                    </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['NamaLengkap'] ?></h5>
                            <b class="card-title"><?= $data['JudulFoto'] ?></b>
                            <p class="card-text"><?= $data['DeskripsiFoto'] ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= $data['TanggalUnggah'] ?></small></p>
                        </div>
                        <form action="proses_komentar.php" method="post">
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan Komentar" aria-describedby="button-addon2" name="IsiKomentar" required>
                                    <input type="hidden" class="form-control" name="FotoID" value="<?= $ID ?>">
                                    <input type="hidden" class="form-control" name="UserID" value="<?= $_SESSION['UserID'] ?>">
                                    <button class="btn btn-outline-secondary" type="submit">Kirim</button>
                                </div>
                        </form>
                    </div>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <a href="like.php?FotoID=<?= $data['FotoID'] ?>">
                                    <h5 class="bi bi-heart-fill btn btn-danger"></h5>
                                </a>
                            </div>
                            <div class="col">
                                <a href="gambar/<?= $data['LokasiFile'] ?>" download>
                                    <h5 class="bi bi-download btn btn-info text-light"></h5>
                                </a>
                            </div>
                            <div class="col">
                                <a href="dislike.php?FotoID=<?= $data['FotoID'] ?>">
                                    <h5 class="bi bi-hand-thumbs-down-fill btn btn-secondary"></h5>
                                </a>
                            </div>
                            <div class="col">
                                <a href="index2.php">
                                    <h5 class="bi bi-arrow-left-circle btn btn-success"></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group">
                        <?php
                        include "koneksi.php";
                        $ID = $_GET['ID'];
                        $sql = mysqli_query($koneksi, "SELECT * from komentarfoto where FotoID=$ID");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <li class="list-group-item"><?= $data['IsiKomentar'] ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        </div>

    <?php
    }
    ?>
</body>

<?php
?>