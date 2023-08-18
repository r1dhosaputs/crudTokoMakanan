<?php

require 'koneksi.php';

if (isset($_POST['create'])) {
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    //cek username sudah ada atau belum
    $cekQuery = "SELECT * FROM t_admin WHERE username = '$username'";
    $cekResult = mysqli_query($db_toko, $cekQuery);

    if (mysqli_num_rows($cekResult) > 0) {
        echo "
            <script>
                alert('username sudah ada');
                document.location.href = 'login.php';
            </script>
        ";
    } else {
        // query
        $query = "INSERT INTO t_admin VALUES('', '$nama', '$username','$password')";
        mysqli_query($db_toko, $query);

        if (mysqli_affected_rows($db_toko) > 0) {
            header("Location:login.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="card">
            <div class="row p-5">
                <div class="col-md-5">
                    <img src="img/login.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-md-7 mt-3">
                    <h2 class="text-center fw-bold">REGISTRASI</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label fw-medium">Username :</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-medium">Password :</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-medium">Nama Lengkap :</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap Mu">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="create" class="btn btn-primary">Create Acc</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>