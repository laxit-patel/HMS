<?php
include("assets/modules/global_module.php"); 
check_token();
$p_id = $_SESSION["login_token"];
$data = mysqli_fetch_assoc(fetch_data("select * from patient where patient_id = '$p_id'","result"));
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/HMS.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Appointment</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS and Icons    -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/waterfall.gif" style="background-position:center;background-size:cover;background-position:fixed">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <?php echo $data['patient_name'];?>
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="dashboard_ptnt.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li >
                    <a href="patient_profile.php" >
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="active">
                    <a href="patient_appointment.php">
                        <i class="pe-7s-note2"></i>
                        <p>Appointment</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
	
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">

                       
                        <li>
                            <a href="logout.php?for=<?php echo $p_id ?>">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
		
		
			    <!--   Big container   -->
	    <div class="container-fluid">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="purple" id="wizardProfile">
		                    <form action="" method="">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	 Take Appointment
		                        	</h3>
									
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#about" data-toggle="tab">Specialization</a></li>
			                            <li><a href="#account" data-toggle="tab">Doctor</a></li>
			                            <li><a href="#address" data-toggle="tab">Date</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="container-fluid">
		                                	<h4 class="info-text"> Select Specialization </h4>
		                                	
		                                	
		                                       
													<div class="input-group">
														<span class="input-group-addon">
														  <i class="material-icons">loupe</i>
														</span>
														<div class="form-group label-floating">
													<label class="control-label">Specialization</label>
														<select name="country" class="form-control">
														<option disabled="" selected=""></option>
	                                                	<option value="Orthopedic"> Orthopedic </option>
	                                                	<option value="Ghynechologist"> Gynaechologist </option>
	                                                	
	                                            	</select>
												  </div>
												  </div>  
		                                    
		                                	
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="account">
									 <div class="container-fluid">
		                                <h4 class="info-text"> Select Doctor </h4>
		                               
		                                    			<div class="input-group">
														<span class="input-group-addon">
														  <i class="material-icons">streetview</i>
														</span>
														<div class="form-group label-floating">
													<label class="control-label">Doctor</label>
														<select name="country" class="form-control">
														<option disabled="" selected=""></option>
	                                                	<option value="Orthopedic"> Mr.Panna </option>
	                                                	<option value="Ghynechologist"> Mrs.Panna </option>
	                                                	
	                                            	</select>
												  </div>
												  </div>
											
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="address">
		                                <div class="container-fluid">
		                                <h4 class="info-text"> Pick A Date </h4>
		                               
		                                    			<div class="input-group">
														<span class="input-group-addon">
														  <i class="material-icons">date_range</i>
														</span>
														<div class="form-group label-floating">
													<label class="control-label">Date</label>
														
														 <input type="text" class="datepicker form-control"  />
														
												  </div>
												  </div>
											
											
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' style="background-color:#9C27B0"/>
		                                <input type='button' class='btn btn-finish btn-fill btn-success btn-wd ' name='finish' value='Finish' style="background-color:#9C27B0"/>
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->

	   

		

        <footer class="footer">
            <div class="container-fluid">
               
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>
					<a href="#">By HPL Team</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	
	
  
	
	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>
	
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	  <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
	
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Rudani Hospital</b> <br> Your Health Companion on-the-go."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>
	
	
	
</html>
