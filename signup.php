<?php
include("Db_con.php");
	$username = $_POST['chef'];
	$email = $_POST['email'];
	$password = $_POST['password'];	
	$conf = $_POST['c_password'];	
	$type = $_POST['usertype'];
	
		if($password == $conf)
		{
			$sql = mysqli_query($conn,"select email from recipe_user where Email='$email' and type='$type'");
			if(mysqli_num_rows($sql)>0)
			{
				echo "<script>alert('E-mail already exists. Please sign in using the email');window.location='signin.php';</script>";
			}
			else
			{
				$p=mysqli_real_escape_string($conn,$password);
				$p=md5($p);
				$result = "INSERT INTO `recipe_user` (`first_name`, `email`, `password`, `confirm_pass`, `type`) VALUES ('$username', '$email', '$password', '$conf', '$type');";
				if ($conn->query($result) === TRUE)
				{
					echo "<script>alert('Thank you for signing up.');</script>";
		    		echo "<script>window.location='signin-page.php';</script>";
				}
				else
				{
					echo "<script>alert('There was some problem please try again later.')</script>";
					echo "<script>window.location='signup-page.php';</script>";
				}
			}
		}
		
		else
		{
			echo "<script>alert('Passwords don't match.');window.location='signup-page.php';</script>";
		}
	
?>