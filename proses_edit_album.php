<?php
$AlbumID = $_GET['AlbumID'];
$NamaAlbum = $_POST['NamaAlbum'];
$Deskripsi = $_POST['Deskripsi'];

include 'koneksi.php';
$sql = "UPDATE album SET NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi' WHERE AlbumID='$AlbumID'";
$query = mysqli_query($koneksi, $sql);
if($query) {
    header("location:album.php");
}else{
    echo"<script>alert('Maaf data tidak tersimpan'); window.location.assign('album.php');</script>";
}
?>