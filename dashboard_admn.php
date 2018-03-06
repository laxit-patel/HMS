<?php
include("assets/modules/global_module.php");
include("assets/modules/theme.php");

check_token("admin");

$name = $_SESSION["admin_token"];
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}
elseif(isset($_SESSION["admin_token"]))
{
	$id = $_SESSION["admin_token"];
}


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


$result = fetch_data("select * from admin where admin_id= '$id'","result");
$data = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">
<head>
    <!--Charts Starts-->
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Mushrooms', 2],
                ['Onions', 2],
                ['Olives', 2],
                ['Zucchini', 2],
                ['Pepperoni', 2]
            ]);

            // Set chart options
            var options = {'title':'How Much Pizza I Ate Last Night',
                'width':400,
                'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <!--Charts Ends-->

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/HMS.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard - Admin</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <link href="assets/css/demo.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">

    <?php menu($data["admin_name"],"dashboard",""); ?>

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

                       <li data-toggle="modal" data-target="#myModal">
                            <a href="#  ">
                                <p>Theme</p>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php?for=<?php echo $data["admin_id"] ?>">
                                <p>Log out</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>

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




        <div class="container-fluid ">
        <h1>Admin Panel</h1>
        </div>
        <div class="container-fluid text-center">
            <div class="row">

                <div class="col-md-6 pull-left">
                    <div class="card" style="background-color:#ff0080">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                            <div id="chart_div"></div>
                                </div>
                                <div class="col-md-8">
                                    <h2>2487</h2>
                                    <h3>Patients have registered</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pul-right">
                    <div class="card" style="background-color: #00ffc0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/img/avatars/005-woman-11.png"   alt="..." height="150" width="150">
                                </div>
                                <div class="col-md-8">
                                    <h2>13</h2>
                                    <h3>Doctors are Working</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 pull-left">
                    <div class="card" style="background-color: #9517ff">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/img/avatars/016-man-10.png"   alt="..." height="150" width="150">
                                </div>
                                <div class="col-md-8">
                                    <h2>27</h2>
                                    <h3>Staff enrolled</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  pull-right">
                    <div class="card" style="background-color: #ccff00">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/img/avatars/024-man-2.png"   alt="..." height="150" width="150">
                                </div>
                                <div class="col-md-8">
                                    <h2>1394</h2>
                                    <h3>Appointments</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
		

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
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Autohide Alet -->
<script src="assets/js/alert_autohide.js"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <1-- Drop down javascript -->
    <script src="assets/js/dropdown.js"></script>

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
                        <a href="set_theme.php?theme=Casual&loc=<?php echo $_SERVER['SCRIPT_NAME']; ?>" ><button type="button" class="btn btn-fill btn-block" style="background-color:#9C27B0">Casual</button></a>
                    </div>
                    <div class="col-md-6 ">
                        <a href="set_theme.php?theme=Professional&loc=<?php echo $_SERVER['SCRIPT_NAME']; ?>"><button type="button" class="btn btn-fill  btn-block" style="background-color: #319997">Professional</button></a>
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
