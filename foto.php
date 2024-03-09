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
    <title>Data Foto</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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


    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="JudulFoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="DeskripsiFoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="LokasiFile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="AlbumID">
                        <?php
                        include "koneksi.php";
                        $UserID = $_SESSION['UserID'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$UserID'");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?= $data['AlbumID'] ?>"><?= $data['NamaAlbum'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <hr>
    <table class="table table-striped table-bordered mt-3">
        <tr class="fw-bold">
            <td class="text-center">No</td>
            <td class="text-center">Foto ID</td>
            <td class="text-center">Judul</td>
            <td class="text-center">Deskripsi</td>
            <td class="text-center">Tanggal</td>
            <td class="text-center">Lokasi file</td>
            <td class="text-center">Status</td>
            <td class="text-center">Album</td>
            <td class="text-center">Jumlah Like</td>
            <td class="text-center">Jumlah Dislike</td>
            <td class="text-center">Aksi</td>
        </tr>
        <?php
        include "koneksi.php";
        $no = 1;
        $UserID = $_SESSION['UserID'];
        $sql = mysqli_query($koneksi, "SELECT * FROM foto,album WHERE foto.UserID='$UserID' and foto.AlbumID=album.AlbumID");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['FotoID'] ?></td>
                <td><?= $data['JudulFoto'] ?></td>
                <td><?= $data['DeskripsiFoto'] ?></td>
                <td><?= $data['TanggalUnggah'] ?></td>
                <td>
                    <img src="gambar/<?= $data['LokasiFile'] ?>" width="100px">
                </td>
                <td>
                    <?php
                    $FotoID = $data['FotoID'];
                    $UserID = $_SESSION['UserID'];
                    $ss = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID=$FotoID and UserID=$UserID");
                    $dd = mysqli_fetch_array($ss); {
                        if ($dd['Status'] == 0) { ?>
                            <span class=""><i><i class="bi bi-eye-slash"></i> Foto ini bersifat privat </i></span>
                        <?php } else if ($dd['Status'] == 1) { ?>
                            <span class=""><i><i class="bi bi-eye"></i> Foto ini dipublish untuk umum </i></span>
                        <?php } else { ?>
                            <span class=""><i><i class="bi bi-eye"></i> Foto ini dipublish untuk anggota </i></span>
                    <?php }
                    } ?>
                </td>
                <td><?= $data['NamaAlbum'] ?></td>
                <td>
                    <?php 
                    $FotoID = $data['FotoID'];
                    $sql2 = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$FotoID'");
                    echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <?php 
                    $FotoID = $data['FotoID'];
                    $sql2 = mysqli_query($koneksi, "SELECT * FROM dislike WHERE FotoID='$FotoID'");
                    echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <?php

                    include 'koneksi.php';
                    $status = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'");
                    $unpublish = mysqli_fetch_array($status); {

                        if ($unpublish['Status'] == 1) {
                            echo '<a href="unpublish.php?FotoID=' . $data['FotoID'] . '" class="btn btn-secondary">UnPublish</a>
                            <a href="publish.php?FotoID=' . $data['FotoID'] . '&publish=2" class="btn btn-success">PubAgt</a>';
                        } else if ($unpublish['Status'] == 0) {
                            echo '<a href="publish.php?FotoID=' . $data['FotoID'] . '&publish=1" class="btn btn-primary">PubUmum</a>
                            <a href="publish.php?FotoID=' . $data['FotoID'] . '&publish=2" class="btn btn-success">PubAgt</a>';
                        } else {
                            echo '<a href="unpublish.php?FotoID=' . $data['FotoID'] . '" class="btn btn-secondary">UnPublish</a>
                            <a href="publish.php?FotoID=' . $data['FotoID'] . '&publish=1" class="btn btn-primary">PubUmum</a>';
                        }
                    }
                    ?>

                    <a href="edit_foto.php?FotoID=<?= $data['FotoID'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data?')" href="hapus_foto.php?FotoID=<?= $data['FotoID'] ?>" class="btn btn-danger">Hapus</a>
                <td>
            </tr>
        <?php  } ?>
    </table>
</body>

</html>