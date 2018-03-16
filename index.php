<?php
include("assets/modules/theme.php");

if(isset($_COOKIE["alert_true"]))
{
    $alert_success = $_COOKIE["alert_true"];
    setcookie("alert_true","",time()-10);
}
if(isset($_COOKIE["alert_false"]))
{
    $alert_danger = $_COOKIE["alert_false"];
    setcookie("alert_false","",time()-10);
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
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll <?php theme("class"); ?>" >
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
                        <a href="index.php"><img src="assets/img/HMS.png" alt="HMS Logo" rel="tooltip" title="<b>Hospital </b> for maternity, orthopedic & gynocology" data-placement="bottom" data-html="true"></a>
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
	<div class="header <?php theme("class_filter"); ?> " style="background-image:url('assets/img/HMS_BG.jpg');">
		<div class="container">

			<div class="row">

				<div class="col-md-8 col-md-offset-2">

					<div class="brand">
                        <div class="container-fluid" id="alert_box" >
                                        <?php

                                        if(isset($alert_success))
                                        {
                                            echo "<div class='container-fluid'><div class='alert alert-success' style='color:black'>
               <div class='container-fluid'>
           <div class='alert-icon'>
            <i class='material-icons'>done_all</i>
          </div>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
          </button>
                   <h4>$alert_success</h4> 
              </div>
          </div></div>";
                                        }
                                        else
                                        {
                                            echo "";
                                        }

                                        if(isset($alert_danger))
                                        {
                                            echo "<div class='alert alert-danger' >
               <div class='container-fluid'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
          </button>
           <div class='alert-icon pull-left'>
            <i class='material-icons'>error_outline</i>
          </div>
          <h4> $alert_danger </h4>
         
                   
              </div>
          </div>";
                                        }
                                        else
                                        {
                                            echo "";
                                        }
                                        ?>
                                    </div>
						<h1>Welcome</h1>
						<h3>To A Multipurpose Hospital</h3>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="main main-raised">


        <div class="section">
	        <div class="container text-center">
	            <div class="row  text-center">
                    <div class="col-md-1    "></div>
                   <div class="col-md-4  ">

	                        <img src="assets/img/HMS.png" alt="Raised Image" class="img-circle img-responsive img-raised">
	                    </div>
	                <div class="col-md-6 ">
	                    <h2>Matchless Hospitality <br>composed By Experience</h2>
	                    <h4>
                            One of the leading gynaecologists of the city, Dr. Panna Rudani (Rudani Hospital) in Rudani Hospital, has established the clinic in 1999 and has gained a loyal clientele over the past few years and is also frequently visited by several celebrities, aspiring models and other honourable clients and international patients as well.
                        </h4>
	                </div>
	            </div>
			</div>
		</div>


        <div class="section">
	        <div class="container text-center">
	            <div class="row  text-center">

<div class="col-md-1    "></div>
	                <div class="col-md-6 ">
	                    <h2>Now At Your Fingertips</h2>
	                    <h4>
                            One of the leading gynaecologists of the city, Dr. Panna Rudani (Rudani Hospital) in Rudani Hospital, has established the clinic in 1999 and has gained a loyal clientele over the past few years and is also frequently visited by several celebrities, aspiring models and other honourable clients and international patients as well.
                        </h4>
	                </div>
                    <div class="col-md-4  ">

	                        <img src="assets/img/fingertips.jpg" alt="Raised Image" class="img-circle img-responsive img-raised">
                    </div>

	            </div>
			</div>
		</div>


	    <div class="section" >
            <div class="section" id="carousel">
				<div class="row">
					<div class="col-md-12 ">

						<!-- Carousel Card -->
						<div class="card card-raised card-carousel">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<div class="carousel slide" data-ride="carousel">

									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-example-generic" data-slide-to="1"></li>
										<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner">
										<div class="item active">
											<img src="assets/img/bg2.jpeg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Yellowstone National Park, United States</h4>
											</div>
										</div>
										<div class="item">
											<img src="assets/img/bg3.jpeg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Somewhere Beyond, United States</h4>
											</div>
										</div>
										<div class="item">
											<img src="assets/img/bg4.jpeg" alt="Awesome Image">
											<div class="carousel-caption">
												<h4><i class="material-icons">location_on</i> Yellowstone National Park, United States</h4>
											</div>
										</div>
									</div>

									<!-- Controls -->
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										<i class="material-icons">keyboard_arrow_left</i>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<i class="material-icons">keyboard_arrow_right</i>
									</a>
								</div>
							</div>
						</div>
						<!-- End Carousel Card -->

					</div>
				</div>

		</div>


	        <div class="container-fluid">
	            <div class="row text-center">
	                <div class="col-md-8 col-md-offset-2">

	                    <h2>Want An Appointment?</h2>
	                    <h4>Cause if you do, it is easy to book appointment on-the-go. just signup & choose from doctors for an appointment. its that easy!!!</h4>
	                </div>
	                <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
	                    <a href="patient_signup.php" class="btn btn-primary btn-lg " <?php  theme('color'); ?> >
							<i class="material-icons">assignment</i> Book Appointment
						</a>
	                </div>
				</div>



	        </div>
	

	    </div>

	</div>


     <footer class="footer">
	    <div class="container">
	        <nav class="pull-left">
	            <ul>
					<li data-toggle="modal" data-target="#myModal">
						<a >
							Change Theme
						</a>
					</li>
					<li>
						<a href="">
						   About Us
						</a>
					</li>
					<li>
						<a href="">
						   Contact Us
						</a>
					</li>

	            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; 2018, made with <i class="material-icons">favorite</i> by HPL.
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

<!-- Theme Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm</h4>
            </div>
            <div class="modal-body">
                <p>Change Theme To </p>
                  <div class="row text-center">
                    <div class="col-md-6 ">
                        <a href="set_theme.php?theme=Casual&loc=<?php echo $_SERVER['SCRIPT_NAME']; ?>" ><button type="button" class="btn btn-fill btn-block" >Casual</button></a>
                    </div>
                    <div class="col-md-6 ">
                        <a href="set_theme.php?theme=Professional&loc=<?php echo $_SERVER['SCRIPT_NAME']; ?>"><button type="button" class="btn btn-fill btn-block" >Professional</button></a>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">



            </div>
        </div>
    </div>
</div>
<!--  Theme Modal -->
	

</html>
