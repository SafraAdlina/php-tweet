<?php 


	
	

if (isset($_POST) && $_POST != null) {
	session_start();
	echo '

	<!DOCTYPE html>
	<html>
	<head>
		<title>PHP Tweets ~ By Kofix</title>';
		
		require 'font.php';
		require 'style.php';
	echo '
	</head>
	<body class="grey lighten-2">
		<div class="navbar-fixed">
			<nav class="deep-purple darken-2 z-depth-4">
			    <div class="nav-wrapper container">
			      <a href="#" class="brand-logo">PHP Tweets ~ <span style="font-size: 1rem;vertical-align: middle; font-style: italic;">powered by Kofix Tech</span></a>
			      <ul id="nav-mobile" class="right hide-on-med-and-down">';

			      	require 'nav.php';
			      	echo '
			      </ul>
			    </div>
			</nav>
		</div>
		
		<br>
		<br>
		<br>
		
		<div class="row">
			<div class="col s12 m4 offset-m4">
				<div class="card-panel white lighten-2">

					<div class="row">
						<div class="col s2 m2" style="padding: 0;">
							<img src="images/profile.png" alt="Contact Person" width="100%" class="z-depth-3">
						</div>
						<div class="col s10 m10">
							<p>'.$user.'<p>
							<p>'.$tweets_row["tweet_text"].'</p>
						</div>
					</div>';
						$_SESSION['error'] 			= "Welcome back!!";

						if (isset($_POST['action']) && $_POST['action'] == "edit_tweet") {
							// edit tweet go here
							require 'openmysqlconnection.php';

							$tweetdata = mysql_query("SELECT * FROM tweets where id='".$_POST['tweet_id']."' ");
							$tweetdata_row = mysql_fetch_assoc($tweetdata);  // array [user_id = "@user"]
							// begin editing
							
							echo '
							<div class="row">
								<form action="process_control.php" method="post" style="padding: 15px;border-radius: 15px">
									<input type="hidden" name="tweet_id" value="'.$_POST['tweet_id'].'">
									<textarea id="textarea1" name="tweet_body" class="materialize-textarea grey lighten-3" style="padding: 0px 10px; -webkit-box-sizing: border-box;">'.$tweetdata_row['tweet_text'].'</textarea>
									<button class="btn waves-effect waves-light" type="submit" name="action" value="tweet_edit" style="width: 100%;text-transform: none"><i class="material-icons left">movie</i>Save tweet !!</button>
								</form>	
								<div style="padding: 15px;">
									<a href="'.$_SERVER['HTTP_REFERER'].'" class="btn waves-effect waves-light" style="width: 100%;text-transform: none"><i class="material-icons left">call_missed</i>Cancel</a>
								</div>
								
							</div>';
							// finish editing

						}elseif (isset($_POST['action']) && $_POST['action'] == "edit_profile") {
							// edit profile go here

							

							$_SESSION['error'] 			= "Opps this feature is not available yet";
							header('Location: '.$_SERVER['HTTP_REFERER']);
							
						}

	echo '
				</div>
			</div>
		</div>';

	require 'script.php';
	
		echo'</body>
	</html>';

}else{
	// wrong page or wrong request
	http_response_code(404);
	include('404.php'); 
	die();

}


 ?>