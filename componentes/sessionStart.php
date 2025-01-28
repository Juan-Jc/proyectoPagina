<?php 
session_start();
if(isset($_SESSION['login'])){
  $hayLogin = $_SESSION['login'];
}else{
  $hayLogin = false;
}
$pageName = "Login";
?> 