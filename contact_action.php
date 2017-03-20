<?php
    include('header.php');
    include('Db_con.php');

    if(isset($_REQUEST['email']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $msg = $_POST['msg'];
        $result = "INSERT INTO `contact` (`contact_name`, `contact_email`, `contact_phone`, `contact_msg`) VALUES ('$name', '$email', '$phone', '$msg')";
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
							<?php
                                if ($conn->query($result) === TRUE)
                                {
                                    echo "<h3>Thank You for Writing Us.</h3>";
                                    echo "<h4>Your query has been recorded. We will get back to you shortly.</h4>";
                                    //header("location:home.html");
                                }
                                else
                                {
                                  echo 'Some unexpected error occured please try again later.';
                                }
    }
                            ?>
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