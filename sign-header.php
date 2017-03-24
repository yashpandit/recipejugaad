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
    <link href="assets/css/style.css" rel="stylesheet"/>
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
        		<a class="navbar-brand" href="index.php"><h4 class="brand2">Recipe Jugaad</h4></a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
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