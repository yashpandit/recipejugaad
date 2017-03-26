<?php
session_start();
error_reporting(0);
include("Db_con.php");
$count = 0;
if(isset($_SESSION['MemberLogin'])){
    $errors= array();
            $first=mysqli_real_escape_string($conn,$_POST['name']);
            $id=$_SESSION['id'];
            $email=mysqli_real_escape_string($conn,$_POST['email']);
            $datepic=strtotime($_POST['dob']);
            $picture=$_FILES['image'];
            $bday = $_POST['bday'];
            $phone=$_POST['phone'];
            $old_pass = $_POST['old_password'];
            $new_pass = $_POST['new_password'];
            $c_pass = $_POST['c_password'];
            $modify=date("Y:m:d H:i:s");
              if(!empty($first))
                {
                    mysqli_query($conn,"UPDATE recipe_user SET first_name='$first', `modified`=current_timestamp  where id='$id'");
                    $count++;
                }
                if(!empty($bday))
                {
                    mysqli_query($conn,"UPDATE recipe_user SET bday='$bday', `modified`=current_timestamp  where id='$id'");
                    $count++;
                }
                if(!empty($email))
                {
                    mysqli_query($conn,"UPDATE recipe_user SET email='$email', `modified`=current_timestamp where id='$id'");
                    $count++;
                }
                if(isset($_FILES['image']))
                {
                     $temp=$_FILES["image"]["name"];
                     
                    $desired_dir="C:/xampp/htdocs/recipejugaad/upload/";
    
                    if(move_uploaded_file($_FILES['image']['tmp_name'],"$desired_dir/".$temp))
                    {
                        $sql="UPDATE recipe_user SET picture='$temp', `modified`=current_timestamp where id='$id'";
                        mysqli_query($conn,$sql);
                        $count++;
                       
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
                    $count++;
                }
                if(!empty($old_pass)){
                    $result = mysqli_query($conn,"SELECT confirm_pass from 'recipe_user' where id='$id'");
                    if (mysqli_num_rows($result)>0) {
                        while($rs = mysqli_fetch_array($result)){  
                             $confp = $rs["confirm_pass"];
                         }
                         if ($old_pass == $confp) {
                            if(!empty($new_pass) && !empty($c_pass)){
                                if ($new_pass == $c_pass) {
                                $p=mysqli_real_escape_string($conn,$new_pass);
                                $p=md5($p);
                                 mysqli_query($conn,"UPDATE recipe_user SET password='$p', confirm_pass='$c_pass', `modified`=current_timestamp where id='$id'");
                                 $count++;
                                 }
                                 else{
                                    echo "<script>alert('The new passwords you enter don't match.');</script>";
                                    echo "<script>window.history.back;</script>";
                                 }
                            }
                         }
                         else{
                            echo "<script>alert('Current password is wrong.Please enter the correct password and try again.');</script>";
                            echo "<script>window.history.back;</script>";
                         }
                    }
                    else{
                        echo "<script>alert('We were unable to update your password.');</script>";    
                    }
                }
                if ($count>0) {
                    $count = 0;
                    echo "<script>alert('Data has been updated successfully');</script>";
                    echo "<script>window.location='userprofile.php';</script>";
                }
    }
    else{
        echo "<script>alert('There is some problem. Please try again later.');</script>";
        echo "<script>window.history.back;</script>";
    }
?>