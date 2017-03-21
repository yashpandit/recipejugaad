<?php
	include("header.php");
	error_reporting(0);
?>

<div class="wrapper">
	<div class="header header-filter">
		<div class="container">
			<div class="row">
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	        <div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-10">
						<div class="card card-signup">
							<form class="form" method="post" action="recipe.php" enctype="multipart/form-data">
								<div class="header header-primary text-center">
									<h4>Add Recipe</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">label</i>
										</span>
										<input type="text" placeholder="Recipe Name" class="form-control" id="rname" name="rname" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">add_shopping_cart</i>
										</span>
										<textarea class="form-control" placeholder="Ingredients" rows="5" id="Ingredient" name="ina" required></textarea>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">description</i>
										</span>
										<textarea class="form-control" placeholder="Steps" rows="5" id="steps" name="steps" required></textarea>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">image</i>
										</span>
										<label>Upload Pictures</label><br>
                                        <input type="file" name="pic[]" multiple="multiple" accept="image/*" required>
									</div>
								</div><br>
								<div class="footer text-center">
									<button type="submit" name="submit" id="submit" class="btn btn-simple btn-primary btn-lg"><b>Submit</b></button>
								</div>
                                
							</form>
						</div>
					</div>
				</div>
	        </div>
	    </div>
	</div>

</div>
<?php
	include("footer.php");
?>
