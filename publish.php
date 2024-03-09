<?php

$FotoID = $_GET['FotoID'];
$publish = $_GET['publish'];

include 'koneksi.php';

if ($publish == 1) {
    mysqli_query($koneksi, "UPDATE foto SET Status='1' WHERE FotoID='$FotoID'");
    header("location:foto.php");
} else {
    mysqli_query($koneksi, "UPDATE foto SET Status='2' WHERE FotoID='$FotoID'");
    header("location:foto.php");
}
?>