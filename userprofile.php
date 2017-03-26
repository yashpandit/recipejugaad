<?php
	include('header.php');
	include('Db_con.php');
	$user = $_SESSION['id'];
	error_reporting(0);
	$query = "SELECT * FROM `recipe_user` where id = '$user'";
	$result = mysqli_query($conn, $query);
        //echo'USER EXIST'; 
        if (mysqli_num_rows($result)>0){ 
            while($rs = mysqli_fetch_array($result))
            {
            	if($rs['picture']!="")
            	{
            		 $pic ="http://localhost/recipejugaad/upload/".$rs['picture'];
            	}
            	else
            	{
            		 $pic ="http://localhost/recipejugaad/upload/logo.png";
            	}
            
             
                 $name = $rs["first_name"];
                 $email = $rs["email"]; 
                 $phone =$rs["phone"]; 
                 $bday=$rs["bday"];
                 $pass=$rs["confirm_pass"];
                
             }
         }
         else{
         	echo "sorry";
         }
?>

<div class="wrapper">
	<div class="header header-filter">	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
	        	<div class="row tim-row">
	                <div class="col-md-4">
                        <ul class="profile-ul">
                            <li>
                            	<br><br>
                                <img src="<?php echo $pic; ?>" class="profile-image" width="200px" height="200px"><br><br>
                                <span class="profile-image-span"><?php echo $name ?></span><br>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                    	<div class="card card-signup">
							<form class="form" method="post" action="updateprofile.php" enctype="multipart/form-data">
								<div class="header header-primary text-center">
									<h4>Your Details</h4>
								</div>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_circle</i>
										</span>
										<input type="text" class="form-control" placeholder="Name" id="name" name="name" value="<?php echo $name ?>">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $email ?>">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">local_phone</i>
										</span>
										<input type="number" placeholder="Phone" class="form-control" id="phone" onblur="checkLen(this)" name="phone" value="<?php echo $phone ?>"/>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">date_range</i>
										</span>
										<input type="date" placeholder="Birth Date" class="form-control" id="bday" name="bday" value="<?php echo $bday ?>"/>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">photo_camera</i>
										</span><br>
										<input type="file" name="image">
									</div>

								</div>
								<div class="footer text-center">
									<input type="submit" class="btn btn-simple btn-primary btn-lg" value="UPDATE"></input>
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