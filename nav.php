<?php 
if (isset($page) && $page == "home") {
	if (isset($user)) {
		echo '<li><a href="#"><div class="chip"><img src="images/yuna.jpg" alt="Contact Person">Jane Doe</div></a></li>';	
	}
	else{
		echo '<li><a href="login.php">login</a></li>';	
	}
}

?>