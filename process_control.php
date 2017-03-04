<?php 


if (isset($_POST) && $_POST != null) {
	if (isset($_POST['action']) && $_POST['action'] == "login") {
		// if login enter here

		// pass parameter
		$username = $_POST['loginname'];
		$password = $_POST['loginpassword'];	

		// begin condition

		// check for symbol
		preg_match_all("/\W/", $username, $got_symbol_in_username); // Matches any character that is not a word character (alphanumeric & underscore). Equivalent to [^A-Za-z0-9_]
		preg_match_all("/\W/", $password, $got_symbol_in_password);

		
		// return for errors for stupid characters
		if(sizeof($got_symbol_in_username[0])){
			session_start();
			$_SESSION['error'] = "Username contain invalid character";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}elseif(sizeof($got_symbol_in_password[0])){
			session_start();
			$_SESSION['error'] = "Password contain invalid character";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		// end return for errors
		}else{
			

			// data cleaned
			$userid = "@".$username;

			// open connection
			require 'openmysqlconnection.php';

			// begin query

			// check if user_id already exist
			$useridexist = mysql_query("SELECT * FROM users where user_id='".$userid."' ");
			$useridexist_row = mysql_fetch_assoc($useridexist);  // array [user_id = "@user"]

			if ($useridexist_row) {
				// if correct password
				session_start();
				$_SESSION['user'] 			= $useridexist_row['user_name'];
				$_SESSION['user_id'] 		= $useridexist_row['user_id'];
				$_SESSION['user_reg_id'] 	= $useridexist_row['id'];
				$_SESSION['user_bio'] 		= $useridexist_row['user_bio'];
				
				$_SESSION['error'] 			= "You have succesfully sign in";
				header('Location: index.php');
			}else{
				// if wrong password

				session_start();
				$_SESSION['error'] = "Username or password is not valid";
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
			
		}
		
	}elseif (isset($_POST['action']) && $_POST['action'] == "register") {
		// if register enter here

		// pass parameter
		$name 		= $_POST['registername'];  // mysql_real_escape_string($_POST['registername']);
		$userid 	= $_POST['registeruserid'];  // mysql_real_escape_string($_POST['registeruserid']);
		$password1 	= $_POST['registerpassword1'];  // mysql_real_escape_string($_POST['registerpassword1']);
		$password2 	= $_POST['registerpassword2'];  // mysql_real_escape_string($_POST['registerpassword2']);

		// begin condition

		// check for symbol
		preg_match_all("/\W/", $name, $got_symbol_in_name); // Matches any character that is not a word character (alphanumeric & underscore). Equivalent to [^A-Za-z0-9_]
		preg_match_all("/\W/", $userid, $got_symbol_in_userid);
		preg_match_all("/\W/", $password1, $got_symbol_in_password1);
		preg_match_all("/\W/", $password2, $got_symbol_in_password2);

		
		// return for errors for stupid characters
		if ($password1 !== $password2) {
			session_start();

			$_SESSION['error'] = "Invalid confirmation password";
			header('Location: ' . $_SERVER['HTTP_REFERER'].'#registerpage');
		}elseif(sizeof($got_symbol_in_name[0])){
			session_start();
			$_SESSION['error'] = "Username contain invalid character";
			header('Location: ' . $_SERVER['HTTP_REFERER'].'#registerpage');
		}elseif(sizeof($got_symbol_in_userid[0])){
			session_start();
			$_SESSION['error'] = "User ID contain invalid character";
			header('Location: ' . $_SERVER['HTTP_REFERER'].'#registerpage');
		}elseif(sizeof($got_symbol_in_password1[0]) || sizeof($got_symbol_in_password2[0])){
			session_start();
			$_SESSION['error'] = "Password contain invalid character";
			header('Location: ' . $_SERVER['HTTP_REFERER'].'#registerpage');
			// end return for errors

		}else{
			// data cleaned
			$userid = "@".$userid;

			// open connection
			require 'openmysqlconnection.php';

			// begin query

			// check if user_id already exist
			$useridexist = mysql_query("SELECT user_id FROM users where user_id='".$userid."' ");
			$useridexist_row = mysql_fetch_assoc($useridexist);  // array [user_id = "@user"]

			
			if(json_encode($useridexist_row) != "false"){
				// if user id exist
				session_start();
				$_SESSION['error'] = "User Id already owned";
				header('Location: ' . $_SERVER['HTTP_REFERER'.'#registerpage']);
			}else{
				// if user id avail

				// begin register
				$newuser = mysql_query("INSERT INTO `users` (`user_id`, `user_name`, `user_pass`)VALUES('".$userid."', '".$name."', '".$password1."');");


				if ($newuser) {
					// if register success
					$userdata = mysql_query("SELECT * FROM users where user_id='".$userid."' ");
					$userdata_row = mysql_fetch_assoc($userdata);  // array [user_id = "@user"]
					
					// sign in registered user
					session_start();
					$_SESSION['error'] 			= "You have succesfully sign up";
					$_SESSION['user'] 			= $userdata_row['user_name'];
					$_SESSION['user_id'] 		= $userdata_row['user_id'];
					$_SESSION['user_reg_id'] 	= $userdata_row['id'];
					$_SESSION['user_bio'] 		= $userdata_row['user_bio'];

					header('Location: index.php');
				}
				
			}
			


			
		}
		
	}elseif (isset($_POST['action']) && $_POST['action'] == "tweet_new") {
		// if tweeting enter here

		
	}elseif (isset($_POST['action']) && $_POST['action'] == "tweet_like") {
		// if favourite enter here
		
	}elseif (isset($_POST['action']) && $_POST['action'] == "tweet_delete") {
		// if deleting tweet enter here

	}elseif (isset($_POST['action']) && $_POST['action'] == "profile_edit") {
		// if editing profile enter here
		
	}
	// $username = $_POST['namadisini'];
	// $password = $_POST['passworddisini'];	

	// $thisquery = mysql_query("SELECT name,password FROM user where name='".$username."' AND password='".$password."'");
	// $row = mysql_fetch_assoc($thisquery); 
	
	// if(json_encode($row) != 'false'){
	// 	// approve login
	// 	session_start();
	// 	$_SESSION["user"]=$username;
	// 	header('Location: index.php');

	// }else{
	// 	die("all wrong");
	// }


}else{
	// wrong page or wrong request
	http_response_code(404);
	include('404.php'); 
	die();

}


 ?>