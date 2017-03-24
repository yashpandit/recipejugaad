<?php
	$id=$_GET['id'];
	mysql_connect("localhost","root","");
	mysql_select_db("supercarstreet");
	$query = "DELETE FROM adminlogin where id = $id";
	$res = mysql_query($query);
	echo "<script>window.location='adminlogin.php'</script>";
?>