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
            echo "logged in successfully";
		}
		else
		{
            echo "check username and password";
		}
}
else
{
	echo "The connection to the database has some problems. Please try later.";
}
?>