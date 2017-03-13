<?php
include "spoonacular.php";
$token='d5855ab5152e80aacedef2372acfe596';  //food2fork
$fooddetail=new Food($token,"json");
$first=$_GET['first'];
$second=$_GET['second'];
$search='http://food2fork.com/api/search?key='.$token.'&q='.$first."+".$second;
echo $search;
$json=$fooddetail->call_url($search);
if(!$json){
echo 'Error: Could not retrieve products list.';
exit();
}
 $details=json_decode($json,TRUE);
	foreach($details['recipes'] as $article) {
    echo "<div class='part'>";
        echo "<div class='part-header'><Strong>".$article['title']."</Strong></div>";
         echo "<div class='part-header'>".$article['publisher']."</div>";
          echo "<div class='part-header'>".$article['source_url']."</div>";
          echo '<img src="'.$article['image_url'].'"/>';
          
    echo "</div>";
}	


?>



