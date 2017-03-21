<?php
include("Db_con.php");
if(isset($_REQUEST['email']))
{
	$email = $_POST['email'];
    $type = $_POST['usertype'];
	$sql = mysqli_query($conn,"select email from recipe_user where Email='$email' and type='$type'");
	if(mysqli_num_rows($sql)>0)
	{
		echo "<script>alert('E-mail already exists. Please sign in using the email');window.location='signin.php';</script>";
	}
	else
	{
		$u=$_POST['chef'];
		$e=$_POST['email'];
		$p=mysqli_real_escape_string($conn,$_POST['password']);  //password encrypted method
		$p=md5($p);
		$t=$_POST['usertype'];
		$result = "insert into recipe_user(first_name,email,password,type) values ('$u'
		,'$e','$p','$t')";
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
?>