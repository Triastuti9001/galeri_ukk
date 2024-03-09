<?php
session_start();
if (!isset($_SESSION['UserID'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Album</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="" rel="stylesheet">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
    </nav>
</head>

<body>
    <h4>Halaman Album</h4>
    <p>Selamat datang <b><?= $_SESSION['NamaLengkap'] ?></b></p>

    <hr>
    <a href="tambah_album.php" class="btn btn-primary">Tambah</a>
    <table class="table table-striped table-bordered mt-3">
        <tr class="fw-bold">
            <td class="text-center">No</td>
            <td class="text-center">Nama Album</td>
            <td class="text-center">Deskripsi</td>
            <td class="text-center">Tanggal Dibuat</td>
            <td class="text-center">Aksi</td>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $sql = "SELECT * FROM album ORDER BY AlbumID DESC";
        $query = mysqli_query($koneksi, $sql);
        foreach ($query as $data) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['NamaAlbum'] ?></td>
                <td><?= $data['Deskripsi'] ?></td>
                <td><?= $data['TanggalDibuat'] ?></td>
                <td>
                <a href="edit_album.php?AlbumID=<?= $data['AlbumID'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Apakah anda yakin akan menghapus data?')" href="hapus_album.php?AlbumID=<?= $data['AlbumID'] ?>" class="btn btn-danger">Hapus</a>
            </tr>
        <?php  } ?>
    </table>
</body>

</html>