<?php
    include "koneksi.php";
    session_start();

    if(!isset($_SESSION['UserID'])){
        header("location:index2.php");
    }else{
        $FotoID=$_GET['FotoID'];
        $UserID=$_SESSION['UserID'];

        $sql=mysqli_query($koneksi,"SELECT * from likefoto where FotoID='$FotoID' and UserID='$UserID'");

        if(mysqli_num_rows($sql)==1){
            header("location:index2.php");
        }else{
            $TanggalLike=date("Y-m-d");
            mysqli_query($koneksi,"insert into likefoto values('','$FotoID','$UserID','$TanggalLike')");
            header("location:index2.php");
        }
    }

    
?>