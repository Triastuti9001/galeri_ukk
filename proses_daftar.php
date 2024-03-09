<?php

include 'koneksi.php';

$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$Email = $_POST['Email'];
$NamaLengkap = $_POST['NamaLengkap'];
$Alamat = $_POST['Alamat'];

mysqli_query($koneksi, "INSERT INTO user VALUES('','$Username','$Password','$Email','$NamaLengkap','$Alamat')");

header("location:login.php?pesan=info_daftar");
?>