<!DOCTYPE html>
<html>
<head>
	<title>PHP Tweets ~ By Kofix</title>
	<?php 
	require 'font.php';
	require 'style.php';
	?>
</head>
<body style="background-color: #F5F8FA;background-image: url('images/loginwallpaper.jpg');background-size: 100% auto;">
	
	<nav class="deep-purple darken-2">
	    <div class="nav-wrapper container">
	      <a href="#" class="brand-logo">PHP Tweets ~ <span style="font-size: 1rem;vertical-align: middle; font-style: italic;">powered by Kofix Tech</span></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	      	<?php 
	      	if (isset($user)) {
	      		echo '<li><a href="#"><div class="chip"><img src="images/yuna.jpg" alt="Contact Person">Jane Doe</div></a></li>';	
	      	}
	      	else{
	      		echo '<li><a href="login.php">login</a></li>';	
	      	}
	      	?>
	      </ul>
	    </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 offset-m6" style=" margin-top: 100px; border: solid #512DA8; border-radius: 15px; background-color: #F6F6F6;padding: 0 ">
				<ul class="tabs" style="border-top-left-radius: 15px;border-top-right-radius: 15px;">
			        <li class="tab col s6"><a href="#test1">LOGIN</a></li>
			        <li class="tab col s6"><a class="active" href="#test2">REGISTER</a></li>
			    </ul>
				<div class="container" id="test1">
					<form class="col s12">
						<h4 style="text-align: center; color: #512DA8"> Login</h4>
						<div class="row">
							<div class="input-field col s12">
								<input placeholder="Placeholder" id="first_name" type="text" class="validate">
								<label for="first_name">First Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
							  	<input id="password" type="password" class="validate">
							  	<label for="password">Password</label>
							</div>
						</div>
				    </form>
				</div>
				<div class="container" id="test2">
					<form class="col s12" >
						<h4 style="text-align: center; color: #512DA8;"> Register</h4>
						<div class="row">
							<div class="input-field col s12">
								<input placeholder="Placeholder" id="first_name" type="text" class="validate">
								<label for="first_name">First Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
							  	<input id="password" type="password" class="validate">
							  	<label for="password">Password</label>
							</div>
						</div>
				    </form>
				</div>
			</div>
		</div>
	</div>
	<?php 
	require 'script.php';
	?>

	<script>
		$(document).ready(function(){
  		  $('ul.tabs').tabs();
  		});
	</script>
</body>
</html>