<?php
	include("header.php");
	mysql_connect("localhost","root","");
	mysql_select_db("supercarstreet");
	$opt = $_POST['opt'];
	$count = mysql_fetch_array(mysql_query("select max(id) from contact"));
	
	for($i=1;$i <= $count[0];$i++)
	{		
	 echo $temp = "c$i";		
		if($opt=="RESET")
		{
			if($_POST[$temp]!="")
			{
				$cvalue = $_POST[$temp];		
				$query="UPDATE `contact` SET  `status` = '$cvalue' WHERE `id` ='$i'";
				mysql_query($query);
			}
		}
		else if($opt=="DELETE")
		{
			if($_POST[$temp]!="")
			{
				$query="DELETE FROM `contact` WHERE `id` ='$i'";
				mysql_query($query);
			}
		}
	}
	echo "<script>window.location='contact.php';</script>";
?>