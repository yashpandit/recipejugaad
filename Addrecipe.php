<?php
include("Db_con.php");
$name=$_POST['Recipename'];
$list=$_POST['Ingredient'];
$recipe=$_POST['Recipe'];

$image = addslashes($_FILES['img_file']['name']);
$img =addslashes(file_get_contents($_FILES['img_file']['tmp_name']));

$sql="insert into Addrecipe (name,image,ingredients,steps) values ('$name','$img','$list','$recipe')";
// if ($conn->query($sql) === TRUE)
// 			{
//     			echo "New record created successfully";
//     			//header("location:Dashboard.php");
// 			}
// 			else 
// 			{
//     			echo "Error: " . $sql . "<br>" . $conn->error;

// $location="recipe-images"; 			
if(mysqli_query($conn, $sql))
{

    echo "Records added successfully.";

} 
else
{
	echo "not inserted";
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error();
}
			

?>

