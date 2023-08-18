<?php

require 'koneksi.php';

session_start();

// var_dump($_POST);

if(isset($_SESSION['login'])) {
    header("Location:index.php");
}

if(isset($_POST['login'])) {
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($db_toko, "SELECT * FROM t_admin WHERE username = '$username'");
    $user = mysqli_fetch_assoc($result);

    // var_dump($user['nama']);

    if($password === $user['password']) {
        $_SESSION['login'] = 'admin';
        $_SESSION['nm_admin'] = $user['username'];
        header("Location:index.php");
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
                <div class="col-md-7 mt-5 pt-5">
                    <h2 class="text-center fw-bold">LOGIN</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label fw-medium">Username :</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-medium">Password :</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                        </div>
                        <div class="d-flex justify-content-between">
                            <!-- <div class="mb-3">
                                <a href="regis.php" aria-disabled="true">Create Account?</a>
                            </div> -->
                            <div class="mb-3">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </div>
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