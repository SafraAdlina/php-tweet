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
	      	<?php require 'nav.php'; ?>
	      </ul>
	    </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 offset-m6" style=" margin-top: 100px; border: solid #512DA8; border-radius: 15px; background-color: #F6F6F6;padding: 0 ">
				<ul class="tabs" style="border-top-left-radius: 15px;border-top-right-radius: 15px;">
			        <li class="tab col s6"><a href="#test1" class="grey-text text-lighten-1">LOGIN</a></li>
			        <li class="tab col s6"><a href="#test2" class="active grey-text text-lighten-1" >REGISTER</a></li>
			    </ul>
				<div class="container" id="test1">
					<form class="col s12" action="process_control.php" method="post">
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
						<div class="row">
							<button class="btn waves-effect waves-light #ab47bc purple lighten-1" type="submit" name="action">Login Now!
							    <i class="material-icons right">send</i>
							</button>
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
						<div class="row">
							<div class="input-field col s12">
							  	<input id="password" type="password" class="validate">
							  	<label for="password">Password</label>
							</div>
						</div>
						<div class="row">
							<button class="btn waves-effect waves-light #ab47bc purple lighten-1" type="submit" name="action">Sign Me Up!
							    <i class="material-icons right">send</i>
							</button>
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