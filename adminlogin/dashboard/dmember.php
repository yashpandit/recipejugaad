<?php
	$id=$_GET['id'];
	mysql_connect("localhost","root","");
	mysql_select_db("supercarstreet");
	$query = "DELETE FROM memberlogin where id = $id";
	$res = mysql_query($query);
	echo "<script>window.location='memberlogin.php'</script>";
?>