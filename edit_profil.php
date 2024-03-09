<?php
$UserID = $_GET['UserID'];

include 'koneksi.php';
session_start();

$sql = "SELECT * FROM user WHERE UserID='$UserID'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Halaman edit data profil</h5>
<link href="css/bootstrap.min.css" rel="stylesheet">

<a href="profil.php" class="btn btn-primary">Kembali</a>
<hr>
<form method="post" action="proses_edit_profil.php?UserID=<?= $UserID; ?>">
    <div class="form-group mb-2">
        <label>User ID</label>
        <input value="<?= $_SESSION['UserID'] ?>" type="text" name="UserID" maxlength="20" class="form-control" readonly>
    </div>
    <div class="form-group mb-2">
        <label>Username</label>
        <input value="<?= $data['Username'] ?>" type="text" name="Username" maxlength="20" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input value="<?= $data['Password'] ?>" type="password" name="Password" maxlength="20" class="form-control" readonly>
    </div>
    <div class="form-group mb-2">
        <label>Email</label>
        <input value="<?= $data['Email'] ?>" type="email" name="Email" maxlength="20" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Lengkap</label>
        <input value="<?= $data['NamaLengkap'] ?>" type="text" name="NamaLengkap" maxlength="30" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Alamat</label>
        <input value="<?= $data['Alamat'] ?>" type="text" name="Alamat" maxlength="30" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="reset" class="btn btn-info">Reset</button>
        <button type="submit" class="btn btn-warning">Simpan</button>
    </div>
</form>