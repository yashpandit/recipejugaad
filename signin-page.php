<?php
	include("sign-header.php")
?>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('assets/img/bg1.jpg'); 
	background-size: cover; 
	background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="post" action="signinscript.php">
								<div class="header header-primary text-center">
									<h4>Sign In</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="email" class="form-control" placeholder="Email..." id="email" name="email" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" placeholder="Password..." class="form-control" id="password" name="password" required/>
									</div>
                                    
                                    <h6 class="userlabel1"><b>Select Type of User : </b></h6>
                                    <div class="input-group input-group2">
                                        <input type="radio" name="usertype" value="chef" required>&nbsp;&nbsp;CHEF&nbsp;
                                        <span><a class="btn btn-simple btn-lg btn-primary" id="usertype" data-toggle="modal" data-target="#chef"><b>?</b></a></span>
                                        
								        <input type="radio" name="usertype" value="Normal" required>&nbsp;&nbsp;NORMAL&nbsp;
                                        <span><a class="btn btn-simple btn-lg btn-primary" id="usertype" data-toggle="modal" data-target="#normalUsers"><b>?</b></a></span>
                                    </div>
                                    
								</div>
								<div class="footer text-center">
									<button type="submit" name="submit" id="submit" class="btn btn-simple btn-primary btn-lg">Login</button>
                                    <a href="forget.php" class="btn btn-simple btn-danger btn-lg">Forgot Password?</a>
									<p><b>Not a member?</b><a href="signup-page.php" class="btn btn-simple btn-success btn-lg"><b>Sign Up</b></a></p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>

    </div>

<div class="modal fade" id="normalUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Normal Users</h3>
      </div>
      <div class="modal-body">
        <h5>Normal Users will be able to access the website with all its features except "Add their own recipes".</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-simple" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>

</html>
