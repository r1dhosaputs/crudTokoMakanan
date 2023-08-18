<?php

require 'koneksi.php';

session_start();

if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}

if (isset($_POST['tambah'])) {
    $nm_makanan = $_POST['nm_makanan'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO t_makanan VALUES ('','$nm_makanan','$harga')";
    $result = mysqli_query($db_toko, $query);

    if ($result) {
        if (mysqli_affected_rows($db_toko) > 0) {
            header("Location:index.php");
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="card">
            <img src="img/login.jpg" alt="" class="img-fluid mx-auto" width="250px">
            <div class="card-body">
                <h3 class="card-tittle">Tambah Makanan/Minuman</h3>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nm_makanan" class="form-label fw-medium">Nama Makanan/Minuman :</label>
                        <input type="text" class="form-control" name="nm_makanan" id="nm_makanan" placeholder="Nama Makanan">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label fw-medium">Harga :</label>
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga tanpa titik atau koma">
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
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