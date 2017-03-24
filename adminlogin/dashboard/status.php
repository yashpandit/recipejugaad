<?php
	mysql_connect("localhost","root","");
	mysql_select_db("supercarstreet");
	$table_name = $_GET['tbl'];
	$status = $_GET['status'];
	$id = $_GET['id'];		
	if($table_name=="sellcar")
	{
		$query="UPDATE `sellcar` SET  `status` = '$status' WHERE `id` ='$id'";
		mysql_query($query) or die("Error:Query is not execute")."<b>".mysql_error()."</b>";
		echo "<script>window.location='sellcar.php';</script>";
	}
	if($table_name=="faq")
	{
		$query="UPDATE `faq` SET  `status` = '$status' WHERE `id` ='$id'";
		mysql_query($query) or die("Error:Query is not execute")."<b>".mysql_error()."</b>";
		echo "<script>window.location='faq.php';</script>";
	}
	if($table_name=="inquiry")
	{
		$query="UPDATE `inquiry` SET  `status` = '$status' WHERE `id` ='$id'";
		mysql_query($query) or die("Error:Query is not execute")."<b>".mysql_error()."</b>";
		echo "<script>window.location='inquiry.php';</script>";
	}
	if($table_name=="contact")
	{
		$query="UPDATE `contact` SET  `status` = '$status' WHERE `id` ='$id'";
		mysql_query($query) or die("Error:Query is not execute")."<b>".mysql_error()."</b>";
		echo "<script>window.location='contact.php';</script>";
	}
	if($table_name=="newcars")
	{
		$query="UPDATE `newcars` SET  `status` = '$status' WHERE `id` ='$id'";
		mysql_query($query) or die("Error:Query is not execute")."<b>".mysql_error()."</b>";
		echo "<script>window.location='newcars.php';</script>";
	}
	if($table_name=="memberlogin")
	{
		$query="UPDATE `memberlogin` SET  `status` = '$status' WHERE `id` ='$id'";
		mysql_query($query) or die("Error:Query is not execute")."<b>".mysql_error()."</b>";
		echo "<script>window.location='memberlogin.php';</script>";
	}
	if($table_name=="adminlogin")
	{
		$query="UPDATE `adminlogin` SET  `status` = '$status' WHERE `id` ='$id'";
		mysql_query($query) or die("Error:Query is not execute")."<b>".mysql_error()."</b>";
		echo "<script>window.location='adminlogin.php';</script>";
	}
?>