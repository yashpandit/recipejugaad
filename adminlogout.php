<?php
	session_start();
	unset($_SESSION['AdminLogin']);	
	echo "<script>window.location='adminlogin/index.html'</script>";
?>