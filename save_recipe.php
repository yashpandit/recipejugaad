<?php
include('header.php');
include('Db_con.php');
error_reporting(0);

$id = $_SESSION['id'];
$sql = "SELECT * FROM `save_recipe` where uid = '$id'";
$result = mysqli_query($conn, $sql);

?>
<div class="wrapper">
	<div class="header header-filter">
	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
                <div class="row">
                    <div class="col-md-12"><br><br><br><br>
                        
                    	<?php 
                            if (mysqli_num_rows($result)>0) {
                                while ($rs = mysqli_fetch_array($result)) {
                                    $recipeName = $rs['recipe_name'];
                                    $recipeLink = $rs['recipe_link'];
                                    $image = $rs['image'];
                                    echo "<div class='col-md-4'>";
                                    echo "<div class='part-header'><a href='".$image."' data-toogle='tooltip' title='".$recipeName."'><b>".$recipeName."</b></a></div>";
                                    echo '<img src="'.$image.'" width="335px" height="235px"><br><hr>';
                                    echo "</div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>