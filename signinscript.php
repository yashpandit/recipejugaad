<?php
include("Db_con.php");
if(isset($_POST['submit']))
{	
		$e=mysqli_real_escape_string($conn,$_POST['email']);
		$p=mysqli_real_escape_string($conn,$_POST['password']);
		$t=$_POST['usertype'];
		$p=md5($p);  // encrypted
		$sql="select * from recipe_user where email='$e'";
		$result=mysqli_query($conn,$sql);
        //echo '<script>Result</script>'
        $row=mysqli_fetch_array($result);
		if($row['password']==$p && $row['type']==$t)
		{
            session_start();
            $_SESSION['id'] = $row['id'];
			$_SESSION['MemberLogin'] = $e;
			$_SESSION['MemberType'] = $t;
			echo "<script>window.location='index.php'</script>";
		}
		else
		{
            echo "<script>alert('Invalid UserName or Password');window.location='signin-page.php'</script>";
		}
}
else
{
	echo "The connection to the database has some problems. Please try later.";
}
?>