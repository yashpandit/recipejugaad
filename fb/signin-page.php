<?php
session_start();
include ('Db_con.php');

require_once __DIR__ . "/facebook-php-sdk-v4-4.0-dev/autoload.php";
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;
		$app_id				= '617400265112193';  //localhost
		$app_secret 		= '1e54bd0ddd6e3574c94f44a655820711';
		$required_scope 	= 'public_profile, publish_actions, email'; 
		$redirect_url 		= 'http://localhost/recipejugaad/fb/signin-page.php'; 

		FacebookSession::setDefaultApplication($app_id , $app_secret);
		$helper = new FacebookRedirectLoginHelper($redirect_url);

		try {
		  $session = $helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
			die(" Error : " . $ex->getMessage());
		} catch(Exception $ex) {
			die(" Error : " . $ex->getMessage());
		}

		if(isset($_GET["log-out"]) && $_GET["log-out"]==1){
			unset($_SESSION["fb_user_details"]);
			header("location: logout.php");
		}


		if ($session){ 
			$date = date('Y-m-d H:i:s');
			$user_profile = (new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=id,first_name,email'))->execute()->getGraphObject(GraphUser::className());

			$_SESSION["fb_user_details"] = $user_profile->asArray(); 
			
			$user_id = ( isset( $_SESSION["fb_user_details"]["id"] ) )? $_SESSION["fb_user_details"]["id"] : "";
			$user_name = ( isset( $_SESSION["fb_user_details"]["first_name"] ) )? $_SESSION["fb_user_details"]["first_name"] : "";
			//$last_name=(isset($_SESSION["fb_user_details"]["last_name"]))?$_SESSION["fb_user_details"]["last_name"] : "";
			
			$user_email = ( isset( $_SESSION["fb_user_details"]["email"] ) )? $_SESSION["fb_user_details"]["email"] : "";
			
			
			$_SESSION['login_user']=$user_email;
			$_SESSION['first_name']=$user_name;
			
			$sql="SELECT oauth_uid from recipe_user where oauth_uid=".$user_id;
			$query=mysqli_query($conn,$sql);
			$row=mysqli_fetch_row($query);
			if(!$row[0])
			{ 
				
				$query="INSERT INTO recipe_user (oauth_provider,oauth_uid,first_name,email,type,created,modified) VALUES('Facebook','$user_id','$user_name','$user_email','Normal','$date','$date')";
				// echo $query;
				// exit;
				$insertdata=mysqli_query($conn,$query);
				$retrieve = "SELECT first_name,id FROM recipe_user WHERE oauth_uid='$user_id'";
		        $result = mysqli_query($conn,$retrieve);
		        
		        foreach ($result as $k => $v) {
		        	$_SESSION['id'] = $v['id'];
		        	$_SESSION['first_name']=$v['first_name'];
		        }
			}
			else{
				$update = "UPDATE recipe_user SET modified='$date' WHERE oauth_uid='$user_id'";
		        mysqli_query($conn,$update);
		        $retrieve = "SELECT id,first_name FROM recipe_user WHERE oauth_uid='$user_id'";
		        $result = mysqli_query($conn,$retrieve);
		        foreach ($result as $k => $v)
		         {
		        	$_SESSION['id'] = $v['id'];
		        	$_SESSION['first_name']=$v['first_name'];
		        }
			}

			header("location:afterlogin.php");
			
		}
		else
		{ 
			if(isset($_SESSION["fb_user_details"]))
			{
				 print 'Hi '.$_SESSION["fb_user_details"]["first_name"].' you are logged in! [ <a href="?log-out=1">log-out</a> ] ';
				 print '<pre>';
				 print_r($_SESSION["fb_user_details"]);
				 print '</pre>';
				 $_SESSION['first_name'];
				 $_SESSION['id'];
				header("location:afterlogin.php");
			
			}
			else
			{
					$login_url = $helper->getLoginUrl( array( 'scope' => $required_scope ) );
			//		echo '<a href="'.$login_url.'">Login with Facebook';
			}
		
		
	}


	//Google Sign Up
		$date = date('Y-m-d H:i:s');
		require_once ('libraries/Google/autoload.php');
		//$client_id = '341474735295-dvgo7h8sc43n5schrfeh2fa0v3erk0og.apps.googleusercontent.com'; socialmedia
		$client_id='893842784463-2mo7kdtthbtvch3hp6gl2g8bq5k097af.apps.googleusercontent.com';
		$client_secret = 'ji4lWFlVCQtrMppXL1P1PfSm';
		$redirect_uri = 'http://localhost/recipejugaad/signin-page.php';

		if (isset($_GET['logout'])) {
		  unset($_SESSION['access_token']);
		}

		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->addScope("email");
		$client->addScope("profile");
		$service = new Google_Service_Oauth2($client);

		if (isset($_GET['code'])) {
		  $client->authenticate($_GET['code']);
		  $_SESSION['access_token'] = $client->getAccessToken();
		  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		  exit;
		}

		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  $client->setAccessToken($_SESSION['access_token']);
		} else {
		  $authUrl = $client->createAuthUrl();
		}

		if (isset($authUrl))
		{
				$authUrl;	
		}

		else {
			
			$user = $service->userinfo->get(); //get user info 
			$_SESSION['login_user']=$user->email;
			$_SESSION['first_name']=$user->name;
			// connect to database
			
			$result = $conn->query("SELECT COUNT(oauth_uid) as usercount FROM recipe_user WHERE oauth_uid=$user->id");
			$user_count = $result->fetch_object()->usercount; 
			
			if($user_count) 
		    {
		        $update = "UPDATE recipe_user SET modified='$date' WHERE oauth_uid='$user->id'";
		        mysqli_query($conn,$update);
		        $retrieve = "SELECT id,first_name FROM recipe_user WHERE oauth_uid='$user->id'";
		        $result = mysqli_query($conn,$retrieve);
		        foreach ($result as $k => $v) {
		        	$_SESSION['id'] = $v['id'];
		        	$_SESSION['first_name'] = $v['first_name'];
		        }
		        header("location:addrecipe.html");
			
		    }
			else
			{ 
		        $query = "INSERT INTO `recipe_user`(`oauth_provider`, `oauth_uid`,`email`,`first_name`,`created`, `modified`) VALUES ('Google','$user->id','$user->email','$user->name','$date','$date')";
		        mysqli_query($conn,$query);
		        echo $query;
		        $retrieve = "SELECT id,first_name FROM recipe_user WHERE oauth_uid='$user->id'";
		        $result = mysqli_query($conn,$retrieve);
		        echo $retrieve;
		        // exit;
		       
		        foreach ($result as $k => $v) {
		        	$_SESSION['id'] = $v['id'];
		        	$_SESSION['first_name']=$v['first_name'];
		        }
		        header("location:index.php");
				
		    }
		}

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Recipe Jugaad | Sign In</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    	function checkemail(){
            
            $(document).ready(function(){
            $("#email1").change(function() {
            var name = $('#email1').val();
            var $msg=$("#disp");
				
            $.ajax({
            type: "POST",
			url: "Signupscript.php",
			data: "email1="+ $(this).val() ,
				success: function(html){
				$("#disp").html("");
				}
				});
				return false;
				}
				});
				});
			}
    </script>

</head>

<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="index.php"><h4 style="margin-top:-2px">Recipe Jugaad</h4></a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
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
		                <a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/Recipe-Jugaad-194056151080597/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-facebook-square"></i>
						</a>
		            </li>
					<li>
		                <a rel="tooltip" title="Follow Us on Instagram" data-placement="bottom"  href="https://www.instagram.com/recipejugaad/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-instagram"></i>
						</a>
		            </li>
        		</ul>
        	</div>
    	</div>
    </nav>
    
    
<div class="modal fade" id="chef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Chef</h3>
      </div>
      <div class="modal-body">
        <h5>Chef will be able to access the website with all its features including "Add their own recipes".</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-simple" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('assets/img/bg1.jpg'); background-size: cover; background-position: top center;">
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

									<!-- If you want to add a checkbox to this form, uncomment this code

									<div class="checkbox">
										<label>
											<input type="checkbox" name="optionsCheckboxes" checked>
											Subscribe to newsletter
										</label>
									</div> -->
                                    
                                    <h6 style="margin-left:18px"><b>Select Type of User : </b></h6>
                                    <div class="input-group" style="margin-left:53px">
                                        <input type="radio" name="usertype" value="chef" required>&nbsp;&nbsp;CHEF&nbsp;
                                        <span><a style="padding-left:3px" class="btn btn-simple btn-lg btn-primary" data-toggle="modal" data-target="#chef"><b>?</b></a></span>
                                        
								        <input type="radio" name="usertype" value="Normal" required>&nbsp;&nbsp;NORMAL&nbsp;
                                        <span><a style="padding-left:3px" class="btn btn-simple btn-lg btn-primary" data-toggle="modal" data-target="#normalUsers"><b>?</b></a></span>
                                    </div>
                                    
								</div>
								<div class="footer text-center">
									<button type="submit" name="submit" id="submit" class="btn btn-simple btn-primary btn-lg">Login</button>
                                    <a href="forget.php" class="btn btn-simple btn-danger btn-lg">Forgot Password?</a>
									<p><b>Not a member?</b><a href="signup-page.php" class="btn btn-simple btn-success btn-lg"><b>Sign Up</b></a></p>
								</div>
								<div><?php echo '<a href="'.$login_url.'">Login with Facebook';
								?>
									<?php echo '<a href="'.$authUrl.'">Login with Google';
								?>
								</div>
							</form>
							<!-- <div>
								<?php echo $loginurl; ?>
								</div> -->
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
