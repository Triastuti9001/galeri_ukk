<?php
$Username = $_POST['Username'];
$Password = md5($_POST['Password']);

include 'koneksi.php';

$sql = "SELECT * FROM user WHERE Username='$Username' and Password='$Password'";

$query = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0) {
    $data = mysqli_fetch_array($query);
    session_start();
    $_SESSION['UserID'] = $data['UserID'];
    $_SESSION['Email'] = $data['Email'];
    $_SESSION['NamaLengkap'] = $data['NamaLengkap'];
    $_SESSION['Alamat'] = $data['Alamat'];
    header("location:index2.php");
}else{
    echo"<script>
    alert('Maaf login gagal, silahkan ulangi lagi');
    window.location.assign('login.php');
    </script>";
}
?>