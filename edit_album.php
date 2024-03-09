<?php
$AlbumID = $_GET['AlbumID'];

include 'koneksi.php';

$sql = "SELECT * FROM album WHERE AlbumID='$AlbumID'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Halaman edit data album</h5>
<link href="css/bootstrap.min.css" rel="stylesheet">

<a href="album.php" class="btn btn-primary">Kembali</a>
<hr>
<form method="post" action="proses_edit_album.php?AlbumID=<?= $AlbumID; ?>">
    <div class="form-group mb-2">
        <label>Nama Album</label>
        <input value="<?= $data['NamaAlbum'] ?>" type="text" name="NamaAlbum" maxlength="20" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Deskripsi</label>
        <input value="<?= $data['Deskripsi'] ?>" type="text" name="Deskripsi" maxlength="50" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="reset" class="btn btn-info">Reset</button>
        <button type="submit" class="btn btn-warning">Simpan</button>
    </div>
</form>