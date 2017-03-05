<?php 


if (isset($_POST) && $_POST != null) {
	if (isset($_POST['action']) && $_POST['action'] == "edit_tweet") {
		// edit tweet go here
		
		session_start();

		$_SESSION['error'] 			= "Opps this feature is not available yet";
		header('Location: '.$_SERVER['HTTP_REFERER']);
		
	}elseif (isset($_POST['action']) && $_POST['action'] == "edit_profile") {
		// edit profile go here

		session_start();

		$_SESSION['error'] 			= "Opps this feature is not available yet";
		header('Location: '.$_SERVER['HTTP_REFERER']);
		
	}

}else{
	// wrong page or wrong request
	http_response_code(404);
	include('404.php'); 
	die();

}


 ?>