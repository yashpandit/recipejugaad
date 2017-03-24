<?php
	$a=$_POST['login'];
	$b=$_POST['password'];
	mysql_connect("localhost","root","");
	mysql_select_db("recipe_jugad");
	$query = "select * from adminlogin where username='$a' AND password='$b'";  
	$res = mysql_query($query);
	if(mysql_num_rows($res))
	{
		session_start();
		$_SESSION['AdminLogin'] = $a;
		echo "<script>window.location='dashboard/index.php'</script>";
	}
	else
	{
		echo "<script>alert('Invalid userName or Password');window.location='index.html'</script>";
	}	
?>

