<?php

require 'koneksi.php';

session_start();

if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}

$id_user = $_GET['id'];

$query = "DELETE FROM t_makanan WHERE id = '$id_user'";
$result = mysqli_query($db_toko, $query);

if($result) {
    header("Location:index.php");
}



?>