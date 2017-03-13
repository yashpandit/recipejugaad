<?php
error_reporting(0);
include "spoonacular.php";
//$token='5amkM22SXImshie7LOMRX848zktxp1LwzQojsnLtNEKhCJFiwo';   // Mashape

$token='d5855ab5152e80aacedef2372acfe596';  //food2fork
//$token='euPPD6XkMkmshVC1HyumHgh5doW5p1N6Zczjsn0sLC1WQbOXmF';//generated of foo2fork  private key
$fooddetail=new Food($token,"json");

$first=$_GET['first'];
$second=$_GET['second'];
$third=$_GET['third'];
$fourth=$_GET['fourth'];

//$search='https://community-food2fork.p.mashape.com/search?key='.$token.'&q='.$pid;   //Food2fork
$search='http://food2fork.com/api/search?key='.$token.'&q='.$first."+".$second."+".$third."+".$fourth;
//key
//echo $search;
$json=$fooddetail->call_url($search);
//echo $details;
if(!$json){
echo 'Error: Could not retrieve products list.';
exit();
}
//var_dump(json_decode($json,TRUE));
 $details=json_decode($json,TRUE);
	foreach($details['recipes'] as $article) {
    echo "<div class='part'>";
        echo "<div class='part-header'><Strong>".$article['title']."</Strong></div>";
         echo "<div class='part-header'>".$article['publisher']."</div>";
          echo "<div class='part-header'>".$article['source_url']."</div>";
          //echo "<div class='part-header'><img src=".$article['image_url']."/></div>";
          echo '<img src="'.$article['image_url'].'"/>';
          
    echo "</div>";
}	


?>



