<?php
include("Db_con.php");
	if(isset($_REQUEST['email']))
{
	$email = $_POST['email'];
    $type = $_POST['usertype'];
	$sql = mysqli_query($conn,"select email from recipe_user where Email='$email' and type='$type'");
	if(mysqli_num_rows($sql)>0)
	{
		echo '<span id="disp"> email already exists </span>';
	}
	else
	{
		$u=$_POST['chef'];
		$e=$_POST['email'];
		$p=mysqli_real_escape_string($conn,$_POST['password']);  //password encrypted method
		$p=md5($p);
		$t=$_POST['usertype'];
		//echo $p;
		$result="insert into recipe_user(chiefname,email,password,type) values ('$u'
		,'$e','$p','$t')";
		if ($conn->query($result) === TRUE)
			{
    			echo "New record created successfully";
    			//header("location:home.html");
			}
			else
			{
				echo '<script>alert("Hello else")</script>';
		
			}

	}
}
?>