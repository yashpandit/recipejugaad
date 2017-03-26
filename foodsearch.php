<?php
error_reporting(0);
include('Db_con.php');
include('header.php');
include "food2fork.php";
include "yummly.php";
$token='d5855ab5152e80aacedef2372acfe596';  //food2fork
$appid='32b240cc';
$token2='8c0104dd667d7e3e37d08ec793a046c5';
$fooddetail=new Food($token,"json");
$fooddetail=new yummly($token2,"json");
$first=$_GET['first'];
$second=$_GET['second'];
$third=$_GET['third'];
$fourth=$_GET['fourth'];

$search='http://food2fork.com/api/search?key='.$token.'&q='.$first."+".$second."+".$third."+".$fourth;
$search2='http://api.yummly.com/v1/api/recipes?_app_id='.$appid.'&_app_key='.$token2.'&'.$first.'+'.$second;
$json=$fooddetail->call_url($search);
$json2=$fooddetail->call_url($search2);
//echo $json2;
if(!$json || !$json2){
echo 'Error: Could not retrieve products list.';
exit();
}
 $details=json_decode($json,TRUE);
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
if($details['recipes']==true || $details2['matches']==true)
{
	foreach($details['recipes'] as $article)
     {
        
        echo '<div class="col-md-4">';
            echo "<div class='part-header'><a href='".$article['source_url']."' data-toogle='tooltip' title='".$article['title']."'><b>".$article['title']."</b></a></div>";
            echo "<div class='part-header'>".$article['publisher']."</div>";
            echo "<div class='part-header'></div>";
            
            echo '<img src="'.$article['image_url'].'" width="335px" height="235px">';    
            if (isset($_SESSION['MemberLogin'])) {
                echo "<input type='submit' name='savef2f' class='btn btn-sm btn-success' value='SAVE'>";
            }
            
        
        echo '<br><hr></div>';
        }
        $link='http://www.yummly.co/#recipe/';  
      foreach($details2['matches'] as $article)
        {
            $recipeName = $article['recipeName'];
            $recipelink=$link.$article['id']; 
            $abc=implode(" ",$article['smallImageUrls']);
                echo '<div class="col-md-4">';
                echo "<div class='part-header'><a href='".$link.$article['id']."' data-toogle='tooltip' title='".$article['recipeName']."'><b>".$article['recipeName']."</b></a></div>";
                
                echo "<div class='part-header'>".$article['sourceDisplayName']."</div>";
                echo "<div class='part-header'></div>";
                echo '<img src="'.$abc.'" width="335px" height="235px">'; 
                if (isset($_SESSION['MemberLogin'])) {
                       echo "<input type='submit' name='save' class='btn btn-sm btn-success' value='SAVE'>";
                   }   
                
        echo '<br><hr></div>';
   
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



