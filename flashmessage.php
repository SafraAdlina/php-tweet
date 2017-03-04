<?php 
if (isset($_SESSION['error'])) {
	$flash = $_SESSION['error'];
	echo '<script>
	$(document).ready(function(){
		Materialize.toast("'.$flash.'", 4000)
	});
	</script>';
}
 ?>