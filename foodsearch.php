<?php
error_reporting(0);
include('Db_con.php');
include('header.php');
include "spoonacular.php";
$token='d5855ab5152e80aacedef2372acfe596';  //food2fork
$fooddetail=new Food($token,"json");

$first=$_GET['first'];
$second=$_GET['second'];
$third=$_GET['third'];
$fourth=$_GET['fourth'];

$search='http://food2fork.com/api/search?key='.$token.'&q='.$first."+".$second."+".$third."+".$fourth;
$json=$fooddetail->call_url($search);
if(!$json){
echo 'Error: Could not retrieve products list.';
exit();
}
 $details=json_decode($json,TRUE);
?>

<style>

    .part-header {
        display:inline-block;
        width:330px;
        white-space: nowrap;
        overflow:hidden !important;
        text-overflow: ellipsis;
    }

</style>

<div class="wrapper">
	<div class="header header-filter">
	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
                <div class="row">
                    <div class="col-md-12"><br><br><br><br>
		
<?php
if($details['recipes']==true)
{
	foreach($details['recipes'] as $article)
     {
        echo '<div class="col-md-4">';
            echo "<div class='part-header'><a href='".$article['source_url']."' data-toogle='tooltip' title='".$article['title']."'><b>".$article['title']."</b></a></div>";
            echo "<div class='part-header'>".$article['publisher']."</div>";
            echo "<div class='part-header'></div>";
            echo '<img src="'.$article['image_url'].'" width="335px" height="235px"><br><hr>';    
        echo '</div>';
        }
}	
 else
        {
            echo "<div class='part-header'></div>";
            echo '<span>No Recipes Found</span><br><hr>';
        }
?>
                    </div>
                </div>
            </div>
	   </div>
    </div>  
</div>

<?php 
?>
<?php
include('footer.php');
?>



