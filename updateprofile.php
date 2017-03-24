<?php
if(isset($_POST['submit'])){
    $errors= array();
            $conn=new mysqli("localhost","root","","socialmedia");
            $first=mysqli_real_escape_string($conn,$_POST['name']);
            $id=$_SESSION['id'];
            //$last=$_POST['last_name'];
            $email=mysqli_real_escape_string($conn,$_POST['email']);
            $datepic=strtotime($_POST['dob']);
            //$dob=date("Y-m-d",$datepic);
            //$city=$_POST['locale'];
            $picture=$_POST['image'];
            $bday = $_POST['bday'];
            $phone=$_POST['phone'];
            $modify=date("Y:m:d H:i:s");
              if(!empty($first))
                {
                    mysqli_query($conn,"UPDATE recipe_user SET first_name='$first', `modified`=current_timestamp  where id='$id'");
                }
                if(!empty($bday))
                {
                    mysqli_query($conn,"UPDATE recipe_user SET bday='$bday', `modified`=current_timestamp  where id='$id'");
                }
                if(!empty($email))
                {
                    mysqli_query($conn,"UPDATE recipe_user SET email='$email', `modified`=current_timestamp where id='$id'");
                }
                if(!empty($picture))
                {
                     $temp=$_FILES["image"]["name"];
                    $desired_dir="/opt/lampp/htdocs/project/recipejugaad/upload/profile/";
    
                    if( move_uploaded_file($_FILES['image']['tmp_name'],"$desired_dir/".$temp))
                    {
                            echo $temp;
                    mysqli_query($conn,"UPDATE recipe_user SET picture='$picture', `modified`=current_timestamp where id='$id'");
                        header("Location:index.php");        
                    }
                    else
                    {
                            echo "sorry";
                            exit;
                    }
                }
                if(!empty($phone))
                {
                    mysqli_query($conn,"UPDATE recipe_user SET phone='$phone', `modified`=current_timestamp where id='$id'");
                }
    }
?>