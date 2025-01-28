<?php
session_start();
session_destroy();
$hayLogin = $_SESSION['login'];
header('location:inicio.php')
?>