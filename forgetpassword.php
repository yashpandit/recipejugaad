<?php
include("Db_con.php");
if(isset($_POST['submit']))
{ 
 $mail=$_POST['email'];
 $q=mysqli_query($conn,"select * from recipe_user where email='".$mail."' ") or die(mysql_error());
 $p=mysqli_affected_rows($conn);
 if($p!=0) 
 {
     echo '<script>alert("1")</script>';
  $res=mysqli_fetch_array($q);
  echo '<script>alert("2")</script>';
  $to=$res['email'];
  $subject='Remind password';
  echo '<script>alert("3")</script>';
  $message='Your password : '.$res['password']; 
  $headers='From:punitdabhi@gmail.com';
  $m=mail($to,$subject,$message,$headers);
  if($m===true)
  {
    echo '<script>alert("if")</script>';
    echo'Check your inbox in mail';
  }
  else
  {
    echo '<script>alert("if else")</script>';
    
   echo'mail is not send';
  }
 }
 else
 {
  echo'You entered mail id is not present';
 }
}
?>