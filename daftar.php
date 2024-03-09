<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-6 text-center mt-5">
                            <img src="assets/register.png" width="500">
                        </div>
                        <div class="col-sm-6">
                            <div class="card-body">
                                <h5 class="mt-3">Silahkan Isi Form Untuk Pendaftaran</h5>
                                <form method="post" action="proses_daftar.php">
                                    <div class="form-group mt-5">
                                        <label>Username</label>
                                        <input type="text" name="Username" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Password</label>
                                        <input type="password" name="Password" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Email</label>
                                        <input type="email" name="Email" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="NamaLengkap" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Alamat</label>
                                        <input type="text" name="Alamat" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary">Daftar</button>
                                    </div>
                                    <div class="form-group mt-5">
                                        <label>Sudah punya akun?Silahkan klik tombol berikut :</label>
                                        <a href="login.php" class="btn btn-warning btn-sm">Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>