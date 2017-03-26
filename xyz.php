<?php
session_start();
error_reporting(0);
include 'Db_con.php';
if(isset($_POST['save']))
{
	$id=$_SESSION['id'];
	$uname=$_SESSION['MemberLogin'];
	$link=$_POST['recipelink'];
	$name=$_POST['recipename'];
	$image=$_POST['image1'];
	$query="select * from save_recipe where uid='$id'";
	echo $query;
	$result=mysqli_query($conn,$query);
		while ($rs = mysqli_fetch_array($result)) {
			if ($rs['recipe_name']==$name) {
				//echo "<script>alert('Recipe already exists.')</script>";
				echo "ssl";	
			}
			else {
				$sql="insert into save_recipe (uid,user_name,recipe_name,recipe_link,image) values ($id,'$uname','$name','$link','$image')";
				mysqli_query($conn,$sql);
				//echo "<script>alert('Recipe Saved Successfully.');</script>";
				//echo "<script>window.history.back();</script>";
				echo $sql;
				exit;
			}	
		}
}
if(isset($_POST['savef2f']))
{
	$id=$_SESSION['id'];
	$uname=$_SESSION['MemberLogin'];
	$link=$_POST['recipelink2'];
	$name=$_POST['recipename2'];
	$image=$_POST['image2'];
	$query="select * from save_recipe where uid='$id'";
	echo $query;
	$result=mysqli_query($conn,$query);
			while ($rs = mysqli_fetch_array($result)) {
			if ($rs['recipe_name']==$name) {
				//echo "<script>alert('Recipe already exists.')</script>";
				echo "already";
			}
			else {
				$sql="insert into save_recipe (uid,user_name,recipe_name,recipe_link,image) values ($id,'$uname','$link','$name','$image')";
				mysqli_query($conn,$sql);
				//echo "<script>alert('Recipe Saved Successfully.');</script>";
				//echo "<script>window.history.back();</script>";
				echo "insert";
				exit;
			}	
		}
		
	
}
?>