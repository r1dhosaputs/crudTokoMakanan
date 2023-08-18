<?php

require 'koneksi.php';

session_start();

if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}

$id_makanan = $_GET['id'];

$result = mysqli_query($db_toko,"SELECT * FROM t_makanan WHERE id = '$id_makanan'");
$makanan = mysqli_fetch_assoc($result);

var_dump($makanan);

if(isset($_POST['update'])) {
    $nm_makanan = $_POST['nm_makanan'];
    $harga = $_POST['harga'];

    $query = "UPDATE t_makanan SET nm_makanan = '$nm_makanan', harga = '$harga' WHERE id = '$id_makanan'";
    $result = mysqli_query($db_toko, $query);

    if ($result) {
        echo "<script>alert('Data berhasil diubah');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah');</script>";
        echo "<script>window.location='index.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAL</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="mb-3">
            <h2 class="text-center fw-bold mb-5">EDIT</h2>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nm_makanan" class="form-label">Nama Makanan :</label>
                <input type="text" name="nm_makanan" id="nm_makanan" value="<?= $makanan['nm_makanan']; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Makanan :</label>
                <input type="number" name="harga" id="harga" value="<?= $makanan['harga']; ?>" class="form-control">
            </div>
            <button type="submit" name="update" class="btn btn-warning">Update Harga</button>
        </form>


    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>