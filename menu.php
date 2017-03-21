<?php
	if(isset($_SESSION['MemberLogin']))
	{
		echo '<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="home.php">Home</a>
				</li>';
				if($_SESSION['MemberType'] == "chef"){
	                echo '<li>
						<a href="addrecipe.php">Add Recipe</a>
					</li>
					<li>
						<a href="savedrecipes.php">Saved Recipes</a>
					</li>';
				}
				else{
					echo '<li>
						<a href="savedrecipes.php">Saved Recipes</a>
					</li>';
				}
				echo '<li>
					<a href="about.php">About Us</a>
				</li>
				<li>
					<a href="contact.php">Contact Us</a>
				</li>
				<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$_SESSION['MemberLogin'].' <b class="caret"></b></a>
        			<ul class="dropdown-menu">
        				<li><a href="userprofile.php">Profile</a></li>
        				<li class="divider"></li>
						<li><a href="userlogout.php">Logout</a></li>
        			</ul>
        		</li>
		        <li>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/Recipe-Jugaad-194056151080597/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
							<i class="fa fa-facebook-square"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/recipejugaad/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
							<i class="fa fa-instagram"></i>
					</a>
				</li>
	    	</ul>';
	}
	else
	{
		echo '<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="home.php"> Home</a>
				</li>
                <li>
					<a href="signin-page.php"> Sign In / Sign Up</a>
				</li>
				<li>
					<a href="about.php">About Us</a>
				</li>
				<li>
					<a href="contact.php">Contact Us</a>
				</li>
		        <li>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/Recipe-Jugaad-194056151080597/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
							<i class="fa fa-facebook-square"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/recipejugaad/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
							<i class="fa fa-instagram"></i>
					</a>
				</li>
	    	</ul>';
	}
?>