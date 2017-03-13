<?php
include("Db_con.php");
$res=mysqli_query($conn,"select image from Addrecipe");
  //$sql = "SELECT image FROM  WHERE id=$id";
 // $result = mysqli_query($conn,$sql);
  // $row = mysqli_fetch_assoc($res);

while($row=mysqli_fetch_array($res))
      { 
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';
     }
  mysqli_close($conn);

  
  
?>
