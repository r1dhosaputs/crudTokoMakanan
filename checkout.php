<?php

require 'koneksi.php';

session_start();

// var_dump($_POST);
// var_dump($_POST);

$totalHarga = 0;
$pesanBayar = "Saya ingin memesan:\n";

foreach ($_POST as $makanan => $harga) {
    $totalHarga += (int) $harga;
    $pesanBayar .= str_replace('_', '', $makanan) . ", Rp. " . number_format($harga, 0, ",", ".") . "." . "\n";
}


$pesanBayar .= "Dengan Total Harga: Rp. " . number_format($totalHarga, 0, ",", ".") . ".";

// var_dump($totalHarga);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
    <style>
    </style>
    <!-- Awesome CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <?php if (empty($_POST)) : ?>
            <h3 class="alert alert-danger">Kamu Belum Memilih Menu</h3>
            <a href="index.php" class="btn btn-dark">Kembali?</a>
        <?php endif; ?>
        <?php foreach ($_POST as $makanan => $harga) : ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <?= str_replace('_', ' ', $makanan); ?>, Rp. <?= number_format($harga, 0, ",", "."); ?>
                </li>
            </ul>
        <?php endforeach; ?>

        <div class="d-flex justify-content-between p-3">
            <div class="mb-3">
                <h4>Total Harga: Rp. <?= number_format($totalHarga, 0, ",", "."); ?> </h4>
            </div>
            <div class="mb-3 btn btn-success pt-1">
                <a href="https://wa.me/+6285750667547/?text=<?= urlencode($pesanBayar); ?>" target="_blank" id="bayar" class="text-white text-decoration-none"><span class="pe-2">Bayar Via</span> <i class="fab fa-whatsapp"></i></a>
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
</body>

</html>