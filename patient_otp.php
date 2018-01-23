<?php

if(isset($_GET["id"]) && isset($_GET["p_email"]) )
{
	$p_id = $_GET["id"];
	$p_email = $_GET["p_email"];
	
}

$server_otp = "3393";

if($_POST)
{
		$user_otp = $_POST["user_otp"];

		if($user_otp == $server_otp)
		{
			$otp_status = "Verified";
			header("LOCATION:patient_login.php?p_email=$p_email");
		}
		else
		{
			$otp_status = "Not-Verified";
		}
}
?> 


	<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/HMS.png">
	<link rel="icon" type="image/png" href="assets/img/HMS.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Rudani Hospital</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
	<link href="assets/css/demo.css" rel="stylesheet" />


</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="assets/img/HMS.png" alt="Creative Tim Logo" rel="tooltip" title="<b>Hospital </b> for maternity, orthopedic & gynocology" data-placement="bottom" data-html="true">
	                </div>
	                <div class="brand">
	                   Rudani Hospital
	                </div>


				</div>
	      
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				
				
				<li>
					<a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/patellaxit8" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-instagram"></i>
					</a>
				</li>

	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('assets/img/HMS_BG.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						
						<h2>OTP<br>Verification</h2>
						
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="main main-raised "  >                              
	     <div class="section section-full-screen section-signup" style="background-image: url('assets/img/city.jpg'); background-size: cover; background-position:center;background-attachment:fixed; ">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="card card-signup">
							<form name="otp-form" class="form" method="POST" >
								<div class="header header-primary text-center">
									<h4><b>Check</b> <br><?php echo $p_email; ?></h4>
									
									<?php
						if(isset($otp_status))
                 {
					 if($otp_status == "Verified")
					 {
                  echo "<div class='alert alert-success' style='margin-bottom:-7%;'>
               <div class='container-fluid'>
           <div class='alert-icon'>
            <i class='material-icons'>check</i>
          </div>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
          </button>
                   <b>$otp_status</b>
              </div>
					 </div>";
					 }
					 elseif($otp_status == "Not-Verified")
					 {
						echo "<div class='alert alert-danger' style='margin-bottom:-7%;'>
               <div class='container-fluid'>
           <div class='alert-icon'>
            <i class='material-icons'>error_outline</i>
          </div>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
          </button>
                   <b> $otp_status</b>
              </div>
					 </div>"; 
					 }
                }
                else
                {
                  echo "";
                }
							?>
									
								</div>
								
								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">vpn_key</i>
										</span>
										<input type="text" name="user_otp"class="form-control" placeholder="Enter OTP">
									</div>
									
								</div>
								<div class="footer text-center">
									
										<input type="submit" value="Verify" class="btn btn-primary btn-round" />
										<br>
									
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>	

	    </div>

	</div>
    <footer class="footer">
	    <div class="container">
	       
	        <div class="copyright pull-right">
	            &copy; 2017, made with <i class="material-icons">favorite</i> by HPL.
	        </div>
	    </div>
	</footer>
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


	<script type="text/javascript">


		$().ready(function(){
			// the body of this function is in assets/material-kit.js
			materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}

		});
	</script>

	

</html>
