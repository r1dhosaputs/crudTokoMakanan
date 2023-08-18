<?php

require 'koneksi.php';

session_start();



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
            <h2 class="text-center fw-bold mb-5">SELAMAT DATANG DI TOKO SEDERHANA</h2>
            <h5 class="fw-medium">Pilih Menu Makanan dan Minuman Anda</h5>
            <?php if (isset($_SESSION['login'])) : ?>
                <?php if ($_SESSION['login'] == 'admin') : ?>
                    <a href="tambah.php" class="link-opacity-50-hover fs-4 mb-3"> + Tambah Menu</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <form action="checkout.php" method="post">
            <?php
            $query = "SELECT * FROM t_makanan";
            $results = mysqli_query($db_toko, $query);

            ?>

            <?php $no = 1; ?>
            <?php foreach ($results as $makanan) : ?>
                <div class="d-flex">
                    <div class="mb-3">
                        <input type="checkbox" name="<?= $makanan['nm_makanan']; ?>" id="<?= $makanan['nm_makanan']; ?>" class="form-check-input p-3" value="<?= $makanan['harga']; ?>">
                        <?php
                        $harga = $makanan['harga'];
                        $formatharga = number_format($harga, 0, ",", "."); ?>
                        <label for="<?= $makanan['nm_makanan']; ?>" class="form-check-label fs-4 ms-3"><?= $makanan['nm_makanan']; ?> , Rp.<?= $formatharga; ?></label>
                    </div>

                    <?php if (isset($_SESSION['login'])) : ?>
                        <?php if ($_SESSION['login'] == 'admin') : ?>
                            <div id="aksi" class="mb-3 ms-4">
                                <a href="edit.php?id=<?= $makanan['id']; ?>" class="btn btn-danger">Edit</a>
                                <a href="hapus.php?id=<?= $makanan['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>


                </div>
                <?php $no++; ?>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-success">CheckOut</button>
            <!-- <div class="mb-3">
                <input type="checkbox" name="makanan[]" id="nasigoreng" class="form-check-input p-3" value="13000">
                <label for="nasigoreng" class="form-check-label fs-4 ms-3">Nasi Goreng , Rp.13.0000</label>
            </div> -->
        </form>

        <?php

        ?>

        <div class="mt-2 d-flex justify-content-between">

            <?php if (isset($_SESSION['nm_admin'])) : ?>
                <h2>SELAMAT DATANG ADMIN, <?= strtoupper($_SESSION['nm_admin']); ?></h2>
            <?php else : ?>
                <a href="login.php" class="btn btn-primary">Login As Admin</a>
            <?php endif; ?>

            <?php if (isset($_SESSION['login'])) : ?>
                <?php if ($_SESSION['login'] == 'admin') : ?>
                    <div>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>