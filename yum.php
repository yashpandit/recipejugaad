<?php
include('Db_con.php');
include "yummly.php";
error_reporting(0);
$appid='32b240cc';
$token2='8c0104dd667d7e3e37d08ec793a046c5';
$fooddetail=new yummly($token2,"json");
$pic="requirePictures";
$i="allowedIngredient";
$first=$_GET['first'];
$search2='http://api.yummly.com/v1/api/recipes?_app_id='.$appid.'&_app_key='.$token2.'&q='.$first.'&'.$pic.'=true';
$json2=$fooddetail->call_url($search2);
 $details2=json_decode($json2,TRUE);
 
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
//$link=$details2['attribution']['url'];
$link='http://www.yummly.co/#recipe/';	
if($details2['matches']==true)
{
	/*foreach($details['recipes'] as $article)
     {
        echo '<div class="col-md-4">';
            echo "<div class='part-header'><a href='".$article['source_url']."' data-toogle='tooltip' title='".$article['title']."'><b>".$article['title']."</b></a></div>";
            echo "<div class='part-header'>".$article['publisher']."</div>";
            echo "<div class='part-header'></div>";
            echo '<img src="'.$article['image_url'].'" width="335px" height="235px"><br><hr>';    
        echo '</div>';
        }*/
        foreach($details2['matches'] as $article)
        {
        	     
        	$abc=implode(" ",$article['smallImageUrls']);
            echo '<div class="col-md-4">';
            echo "<div class='part-header'><a href='".$link.$article['id']."' data-toogle='tooltip' title='".$article['recipeName']."'><b>".$article['recipeName']."</b></a></div>";
            echo "<div class='part-header'>".$article['ingredients']."</div>";
            echo "<div class='part-header'></div>";
            echo '<img src="'.$abc.'" width="335px" height="235px"><br><hr>';    
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