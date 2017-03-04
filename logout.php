<?php 
session_start();
unset($_SESSION["user"]);
unset($_SESSION['user_id']);
unset($_SESSION['user_reg_id']);
unset($_SESSION['user_bio']);
$_SESSION['error'] = "You have successfully logout";
header('Location: login.php');

 ?>