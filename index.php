<?php
	include("header.php")
?>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h2>Jugaad for Recipe</h2>
						<p class="description2">‘Recipe Jugaad’ is a website for finding recipes when you have limited ingredients and no idea what recipe to cook with those ingredients. The website provides users the ease of cooking food with limited resources, in a smart and efficient manner. The website will ask the user to enter the ingredients which he currently possesses. Once the user hits the search recipes button he will be getting a list of recipes from all the categories which he can filter as per his/her requirements. Also the website will get smarter as per the user preference and return results which are best suited for that particular user.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
	        	<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="get" action="foodsearch.php">
								<div class="header header-primary text-center">
									<h4>Search Recipe By Ingredients</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">add_shopping_cart</i>
										</span>
										<input type="text" class="form-control" placeholder="Ingredient 1" id="first" name="first" required> 
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">add_shopping_cart</i>
										</span>
										<input type="text" class="form-control" placeholder="Ingredient 2" id="second" name="second">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">add_shopping_cart</i>
										</span>
										<input type="text" placeholder="Ingredient 3" class="form-control" id="third" name="third" />
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">add_shopping_cart</i>
										</span>
										<input type="text" placeholder="Ingredient 4" class="form-control" id="fourth" name="fourth" />
										
									</div>
								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-simple btn-primary btn-lg">Find yummy recipes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
		     </div>         
	    </div>		
	</div>
	              
<?php
	include("footer.php")
?>