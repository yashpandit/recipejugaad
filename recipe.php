<?php
session_start();
error_reporting(0);
include("Db_con.php");
if(isset($_SESSION['MemberLogin']))
{
$date=date('Y-m-d H-i-s');
$id=$_SESSION['id'];
$fn=$_SESSION['MemberLogin']  ;
$name=mysqli_real_escape_string($conn,$_POST['rname']);
$list=mysqli_real_escape_string($conn,$_POST['ina']);
$step=mysqli_real_escape_string($conn,$_POST['steps']);
$temp="";
    foreach($_FILES['pic']['tmp_name'] as $key => $tmp_name ){
        $file_name =$_FILES['pic']['name'][$key];
        $file_size =$_FILES['pic']['size'][$key];
        $file_tmp =$_FILES['pic']['tmp_name'][$key];
        $temp=$temp.",".$file_name; $desired_dir="/opt/lampp/htdocs/project/recipejugaad/upload/";
       
        if(empty($errors)==true){

            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir".$file_name);
            }
         
            }        
        }
        
        $temp1=preg_replace("/^,/","", $temp);
        
     $query = "INSERT INTO `addrecipe`(`id`,`first_name`, `recipe_name`, `ingredients`, `picture`, `steps`, `recipedate`) values ('$id','$fn','$name','$list','$temp1','$step','$date')";
    
        if(mysqli_query($conn,$query)){
            echo "<script>alert('Thank You For Sharing Your Recipe.');window.location='index.php';</script>";
        }
        else{
            echo "not done";
        }
              
}
else {
    echo "<script>alert('You are not logged in.');window.location='signin-page.php';</script>";
}

?>