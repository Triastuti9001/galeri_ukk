<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h5 class="text-center">Halaman Login</h5>
                <div class="card">
                    <div class="card-header">
                        <img src="assets/login.png" width="100%">
                    </div>
                    <div class="card-body">
                        <form action="proses_login.php" method="post">
                            <div class="form-group mt-3">
                                <label>Username</label>
                                <input type="text" name="Username" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Password</label>
                                <input type="password" name="Password" class="form-control" required>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="form-group mt-2">
                                <label>Belum punya akun?Silahkan klik tombol berikut :</label>
                                <a href="daftar.php" class="btn btn-warning btn-sm">Daftar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>