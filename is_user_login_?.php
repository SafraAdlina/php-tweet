<?php

session_start();

if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	$user_id = $_SESSION['user_id'];
}else{
	
	$_SESSION['error'] = "Please log in first !!";
	header('Location: login.php');
}
 ?>
