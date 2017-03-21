<?php
session_start();
include("Db_con.php");
if(isset($_POST['submit']))
{
$date=date('Y-m-d H-i-s');
$fn=$_SESSION['MemberLogin']  ;
$name=mysqli_real_escape_string($conn,$_POST['rname']);
$list=mysqli_real_escape_string($conn,$_POST['ina']);
$step=mysqli_real_escape_string($conn,$_POST['steps']);
$temp="";
    foreach($_FILES['pic']['tmp_name'] as $key => $tmp_name ){
        $file_name =$_FILES['pic']['name'][$key];
        $file_size =$_FILES['pic']['size'][$key];
        $file_tmp =$_FILES['pic']['tmp_name'][$key];
        $temp=$temp.",".$file_name;
        $desired_dir="C:/xampp/htdocs/recipejugaad/upload";
       
        if(empty($errors)==true){

            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }
         
            }        
        }
        
        $temp1=preg_replace("/^,/","", $temp);
        
     $query = "INSERT INTO `addrecipe`(`first_name`, `recipe_name`, `ingredients`, `image`, `steps`, `recipedate`) values ('$fn','$name','$list','$temp1','$step','$date')";
        if(mysqli_query($conn,$query)){
            echo "<script>alert('Your recipe has been submitted.');window.location='index.php';</script>";
        }
        else{
            echo "not done";
        }
              
}


?>

