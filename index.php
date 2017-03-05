<?php 
session_start();
$page = "home";
require 'is_user_login_?.php';

// begin tweet query
require 'openmysqlconnection.php';
$tweets = mysql_query("SELECT * FROM tweets ");

// setting total user tweets
$tweets_done = mysql_query("SELECT * FROM tweets where tweet_user=".$_SESSION['user_reg_id']."");
$tweets_done_row = mysql_num_rows($tweets_done);
$total_tweets = json_encode($tweets_done_row);
if (json_encode($tweets_done_row) < 1) {
	$total_tweets = 0;
}
// ending set total user tweets

// setting total user like tweets
$tweets_like = mysql_query("SELECT * FROM tweets WHERE tweet_like LIKE '%".$_SESSION['user_reg_id']."%'");
$tweets_like_row = mysql_num_rows($tweets_like);
$total_tweets_like = json_encode($tweets_like_row);
if (json_encode($tweets_like_row) < 1) {
	$total_tweets_like = 0;
}
// ending set total user like tweets

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
				
					<div class="row">';

					// check if user already like or not
					$alreadylike = mysql_query("SELECT tweet_like FROM tweets WHERE id=".$tweets_row['id']." AND tweet_like LIKE '%".$_SESSION['user_reg_id']."%'");
					$alreadylike_row = mysql_fetch_assoc($alreadylike);  
					// end checking

					// check if user owned the tweet
					$owntweet = mysql_query("SELECT tweet_user FROM tweets WHERE id=".$tweets_row['id']." AND tweet_user=".$_SESSION['user_reg_id']." ");
					$owntweet_row = mysql_fetch_assoc($owntweet);  
					// end checking					

					// like section
						if (json_encode($alreadylike_row) == "false") {
							echo '<form action="process_control.php" method="post">
										<input type="hidden" name="tweet_id" value="'.$tweets_row['id'].'">
										<button class="btn-flat col s4 m4 grey-text text-lighten-1" type="submit" name="action" value="tweet_like" style="text-transform: none">LIKE</button>
									</form>';
						}else{
							echo '<div class="col s4 m4 purple-text text-lighten-1" style="text-align: center;">LIKED</div>';
						}
					// end of like section
						
					// edit section
						if (json_encode($owntweet_row) != "false") {
							echo '<form action="sub_process_control.php" method="post">
										<input type="hidden" name="tweet_id" value="'.$tweets_row['id'].'">
										<button class="btn-flat col s4 m4 grey-text text-lighten-1" type="submit" name="action" value="edit_tweet" style="text-transform: none">EDIT</button>
									</form>';
						}
					// end of edit section

					// delete section
						if (json_encode($owntweet_row) != "false") {
							echo '<form action="process_control.php" method="post">
										<input type="hidden" name="tweet_id" value="'.$tweets_row['id'].'">
										<button class="btn-flat col s4 m4 grey-text text-lighten-1" type="submit" name="action" value="tweet_delete" style="text-transform: none">DELETE</button>
									</form>';
						}
					// end of delete section



					
				echo '</div>
					<!-- like edit delete -->
				</div>';
			}
			?>
			<!-- end loop -->
			
		</div>

		<!-- profile section -->
		<div class="col s12 m4">
			<div class="container">
				<div class="card-panel white lighten-2">
					<div class="row">
						<div class="col s4 m4 offset-s4 offset-m4" style="padding: 0;">
							<img src="images/profile.png" alt="Contact Person" width="100%" class="z-depth-3">
						</div>	
					</div>
					<div class="row">
						<div class="col s6 m6" style="text-align: center;padding: 0;"><?php echo $total_tweets_like; ?> Likes</div>
						<div class="col s6 m6" style="text-align: center;padding: 0;"><?php echo $total_tweets; ?> Tweets</div>
					</div>
					<hr>
					<!-- status -->
					<div class="row">
						<div class="col s12 m12" style="">
							<?php 
								if ($_SESSION['user_bio']) {
									echo $_SESSION['user_bio']; 	
								}else{
									echo "What's on my mind ... ";
								}
							?>
						</div>
					</div>
					<!-- end status -->
					<hr>
					<div class="row">
						<div class="col s6 m6">
							<form action="sub_process_control.php" method="post">
								<button class="btn col s12 m12 white-text text-lighten-1" type="submit" name="action" value="edit_profile" style="text-transform: none">Profile</button>
							</form>
						</div>
						<div class="col s6 m6">
							<form action="sub_process_control.php" method="post">
								<a href="logout.php" class="btn col s12 m12 white-text text-lighten-1" type="submit" name="action" value="edit_profile" style="text-transform: none">Logout</a>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<!-- end of profile section -->

	</div>
	
	<?php 
	require 'script.php';
	?>

	<script>
		$(document).ready(function(){
			// your javascript go here

  		});
	</script>
	<?php 
		require 'flashmessage.php';
	 ?>
	
</body>
</html>