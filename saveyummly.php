<?php
session_start();
include ('Db_con.php');
if(isset($_POST['save2']))
{
	$id=$_SESSION['id'];
	$uname=$_SESSION['MemberLogin'];
	$link=$_POST['rlinky'];
	$name=$_POST['rnamey'];
	$image=$_POST['imgy'];
	$query="select recipe_name from save_recipe where recipe_name='$name'";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	if($row['recipe_name']==$name)
	{
		header('location:save_recipe.php');
	}
	else
	{
		$sql="insert into save_recipe (`uid`,`user_name`,`recipe_name`,`recipe_link`,`image`) values 
		($id,'$uname','$name','$link','$image')";
		mysqli_query($conn,$sql);
		echo "<script>alert('Recipe Saved Successfully.');</script>";
		echo "<script>window.history.back();</script>";
		echo $sql;
		exit;
	}
}
?>