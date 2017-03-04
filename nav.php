<?php 
if (isset($page) && $page == "home") {
	if (isset($user)) {
		echo '<li><a href="#"><div class="chip"><img src="images/profile.png" alt="Contact Person">'.$user.'</div></a></li>';
		echo '<li><a href="logout.php"><div class="chip">logout</div></a></li>';	
	}
	else{
		echo '<li><a href="login.php">login</a></li>';	
	}
}

?>