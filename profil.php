<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand">Gallery</a>
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
  <style>
    body {
      background-color: #f9f9fa
    }

    .padding {
      padding: 3rem !important
    }

    .user-card-full {
      overflow: hidden;
    }

    .card {
      border-radius: 5px;
      -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
      box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
      border: none;
      margin-bottom: 30px;
    }

    .m-r-0 {
      margin-right: 0px;
    }

    .m-l-0 {
      margin-left: 0px;
    }

    .user-card-full .user-profile {
      border-radius: 5px 0 0 5px;
    }

    .bg-c-lite-green {
      background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
      background: linear-gradient(to right, #ee5a6f, #f29263);
    }

    .user-profile {
      padding: 20px 0;
    }

    .card-block {
      padding: 1.25rem;
    }

    .m-b-25 {
      margin-bottom: 25px;
    }

    .img-radius {
      border-radius: 5px;
    }



    h6 {
      font-size: 14px;
    }

    .card .card-block p {
      line-height: 25px;
    }

    @media only screen and (min-width: 1400px) {
      p {
        font-size: 14px;
      }
    }

    .card-block {
      padding: 1.25rem;
    }

    .b-b-default {
      border-bottom: 1px solid #e0e0e0;
    }

    .m-b-20 {
      margin-bottom: 20px;
    }

    .p-b-5 {
      padding-bottom: 5px !important;
    }

    .card .card-block p {
      line-height: 25px;
    }

    .m-b-10 {
      margin-bottom: 10px;
    }

    .text-muted {
      color: #919aa3 !important;
    }

    .b-b-default {
      border-bottom: 1px solid #e0e0e0;
    }

    .f-w-600 {
      font-weight: 600;
    }

    .m-b-20 {
      margin-bottom: 20px;
    }

    .m-t-40 {
      margin-top: 20px;
    }

    .p-b-5 {
      padding-bottom: 5px !important;
    }

    .m-b-10 {
      margin-bottom: 10px;
    }

    .m-t-40 {
      margin-top: 20px;
    }

    .user-card-full .social-link li {
      display: inline-block;
    }

    .user-card-full .social-link li a {
      font-size: 20px;
      margin: 0 10px 0 0;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }
  </style>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <?php
  $UserID = $_SESSION['UserID'];
  include 'koneksi.php';
  $sql = "SELECT * FROM user WHERE UserID='$UserID'";
  $query = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);
  ?>
  <div class="page-content page-container" id="page-content">
    <div class="padding">
      <div class="row container d-flex justify-content-center">
        <div class="col-xl-6 col-md-12">
          <div class="card user-card-full">
            <div class="row m-l-0 m-r-0">
              <div class="col-sm-4 bg-c-lite-green user-profile">
                <div class="card-block text-center text-white">
                  <div class="m-b-25">
                    <img src="assets/pf.png" class="img-radius rounded-circle " style="width: 100%; height: 100%;" alt="">
                  </div>
                  <h6 class="f-w-600"><?= $data['Username'] ?></h6>
                  <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="card-block">
                  <h6 class="m-b-20 p-b-5 b-b-default f-w-600">full information</h6>
                    <div class="row">
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">UserID</p>
                      <h6 class="text-muted f-w-400"><?= $_SESSION['UserID'] ?></h6>
                    </div>
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Nama Lengkap</p>
                      <h6 class="text-muted f-w-400"><?= $data['NamaLengkap'] ?></h6>
                    </div>
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Username</p>
                      <h6 class="text-muted f-w-400"><?= $data['Username'] ?></h6>
                    </div>
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Alamat</p>
                      <h6 class="text-muted f-w-400"><?= $data['Alamat'] ?></h6>
                    </div>
                    <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Email</p>
                      <h6 class="text-muted f-w-400"><?= $data['Email'] ?></h6>
                    </div>
                    <a href="edit_profil.php?UserID=<?= $_SESSION['UserID'] ?>" class="btn btn-warning mt-2">Edit</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>