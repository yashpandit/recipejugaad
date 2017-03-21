<?php
	include('header.php');
	error_reporting(0);
?>

<div class="wrapper">
	<div class="header header-filter">	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
	        	<div class="row tim-row">
	                <div class="col-md-3">
                        <ul style="list-style-type:none; font-size: 18px">
                            <li>
                            	<br><br>
                                <img src="assets/img/yash.jpg" style="border-radius:100px"><br><br>
                                <span style="padding-left:50px">Yash Pandit</span><br>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                    	<div class="card card-signup">
							<form class="form" method="post" action="contact_action.php">
								<div class="header header-primary text-center">
									<h4>Your Details</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_circle</i>
										</span>
										<input type="text" class="form-control" placeholder="Name" id="name" name="name" required> 
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">local_phone</i>
										</span>
										<input type="number" placeholder="Phone" class="form-control" id="phone" onblur="checkLen(this)" name="phone" required/>
									</div>

									<div class="input-group">
									</div>
								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-simple btn-primary btn-lg"><b>Save</b></button>
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
	include('footer.php');
?>