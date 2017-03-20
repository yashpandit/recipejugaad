<?php
	include("header.php")
?>

<script>

    function checkLen(el) {
      if (el.value.length != 10) {
        alert("length must be exactly 10 characters")
      }
    }

</script>

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
							<form class="form" method="post" action="contact_action.php">
								<div class="header header-primary text-center">
									<h4>Contact Us</h4>
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
										<span class="input-group-addon">
											<i class="material-icons">question_answer</i>
										</span>
                                        <textarea placeholder="Your Message" class="form-control" id="msg" name="msg" rows="5" required></textarea>
									</div>
								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-simple btn-primary btn-lg"><b>Submit</b></button>
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
	include("footer.php")
?>
