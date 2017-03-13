<?php
include("Db_con.php");
$result=mysqli_query($conn,"select * from Addrecipe") or die("error" .mysqli_error($conn));
$data = array();
while ( $row = mysqli_fetch_assoc($result) )
{
  $data[] = $row;
}
echo json_encode( $data );

?>

