<?php 

session_start();

// session destroy
$_SESSION = [];
session_unset();
session_destroy();

header("Location:login.php");

?>
