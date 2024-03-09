<?php
    include "koneksi.php";
    session_start();

    if(!isset($_SESSION['UserID'])){
        header("location:index2.php");
    }else{
        $FotoID=$_GET['FotoID'];
        $UserID=$_SESSION['UserID'];

        $sql=mysqli_query($koneksi,"SELECT * from dislike where FotoID='$FotoID' and UserID='$UserID'");

        if(mysqli_num_rows($sql)==1){
            header("location:index2.php");
        }else{
            $TanggalDislike=date("Y-m-d");
            mysqli_query($koneksi,"INSERT into dislike values('','$FotoID','$UserID','$TanggalDislike')");
            header("location:index2.php");
        }
    }

?>