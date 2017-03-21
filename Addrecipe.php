<?php
include("Db_con.php");
$name=$_POST['Recipename'];
$list=$_POST['Ingredient'];
$recipe=$_POST['Recipe'];

$image = addslashes($_FILES['img_file']['name']);
$img =addslashes(file_get_contents($_FILES['img_file']['tmp_name']));

$sql="insert into Addrecipe (name,image,ingredients,steps) values ('$name','$img','$list','$recipe')";		
if(mysqli_query($conn, $sql))
{
    echo "Records added successfully.";

} 
else
{
	echo "not inserted";
}
?>

