<?php 
session_start();
$page = "home";
require 'is_user_login_?.php';

// begin tweet query
require 'openmysqlconnection.php';
$tweets = mysql_query("SELECT * FROM tweets where tweet_user='".$_SESSION['user_reg_id']."' ");


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Tweets ~ By Kofix</title>
	<?php 
	require 'font.php';
	require 'style.php';
	?>
</head>
<body class="grey lighten-2">
	<div class="navbar-fixed">
		<nav class="deep-purple darken-2 z-depth-4">
		    <div class="nav-wrapper container">
		      <a href="#" class="brand-logo">PHP Tweets ~ <span style="font-size: 1rem;vertical-align: middle; font-style: italic;">powered by Kofix Tech</span></a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		      	<?php require 'nav.php'; ?>
		      </ul>
		    </div>
		</nav>
	</div>
	
	<br>
	<br>
	<br>
	
	<div class="row">
		<div class="col s12 m4">
			<div class="container">
				<form action="process_control.php" method="post" style="padding: 15px;border-radius: 15px" class="deep-purple darken-2 z-depth-5">
					<h4 style="text-align: center;color: white">New Tweet!!</h4>
					<input type="text" name="tweet_body" class="grey lighten-5" placeholder="What's happening?" style="padding: 0px 10px; -webkit-box-sizing: border-box;">
					<button class="btn waves-effect waves-light" type="submit" name="action" value="tweet_new" style="width: 100%;text-transform: none"><i class="material-icons left">mode_edit</i>Just tweet !!</button>
				</form>	
			</div>
		</div>
		<div class="col s12 m4">


			<!-- begin loop -->
			<?php 
			while ($tweets_row = mysql_fetch_assoc($tweets)) {

				echo '<div class="card-panel white lighten-2">
					<div class="row">
						<div class="col s2 m2" style="padding: 0;">
							<img src="images/profile.png" alt="Contact Person" width="100%" class="z-depth-3">
						</div>
						<div class="col s10 m10">
							<p>'.$user.'<p>
							<p>'.$tweets_row["tweet_text"].'</p>
						</div>
					</div>
					<div class="row">
						<a href=""><div class="col s4 m4 grey-text text-lighten-1" style="text-align: center;">LIKE</div></a>
						<a href=""><div class="col s4 m4 grey-text text-lighten-1" style="text-align: center;">EDIT</div></a>
						<a href=""><div class="col s4 m4 grey-text text-lighten-1" style="text-align: center;">DELETE</div></a>
						<!-- like edit delete -->
					</div>
				</div>';
			}
			?>
			<!-- end loop -->
			
		</div>
		<div class="col s12 m4">
			
		</div>
	</div>
	
	<?php 
	require 'script.php';
	?>

	<script>
		$(document).ready(function(){


  		});
	</script>
	<?php 
		require 'flashmessage.php';
	 ?>
	
</body>
</html>