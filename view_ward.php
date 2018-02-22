<?php
include("assets/modules/global_module.php");
check_token("admin");
$name = $_SESSION["admin_token"];

if(isset($_GET["msg_t"]))
{
	$alert_success = $_GET["msg_t"];
}
if(isset($_GET["msg_f"]))
{
	$alert_danger = $_GET["msg_f"];
}
if(isset($_GET["ward_id"]))
{
	$ward_id = $_GET["ward_id"];
}
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
}
elseif(isset($_SESSION["admin_token"]))
{
    $id = $_SESSION["admin_token"];
}
$result = fetch_data("select * from admin where admin_id= '$id'","result");
$data = mysqli_fetch_assoc($result);
$result = fetch_data("select * from ward where ward_id= '$id'","result");


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/HMS.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard - Ward</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--fresh table-->
    <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">

    <?php menu($data["admin_name"],"setting","ward"); ?>

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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>View Ward</a>
                </div>
                <div class="collapse navbar-collapse">


                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a href="logout.php?for=<?php echo $data["admin_id"] ?>">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

		<br>
        <!--   Big container   -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
				
                    <div class="card card-user">
                            
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
							
                            <div class="content">
                                                          
                                <div class="content">
                                    <form method="POST" name="admin_edit_patient">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <input type="text" name="d_id" class="form-control" id="ward_id" readonly value="<?php if(isset($ward_id)){ echo $ward_id; } ?>">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Name</label>
                                                    <input type="text" name="d_name" id="ward_name" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
										
										<hr>
										
										<div class="row ">
                                            
                                            
                                             <div class="col-md-12">
                                                
												<div class="fresh-table full-color-purple" >
                                                          

                                                            <table id="fresh-table" class="table">
                                                                <thead>
                                                                <th data-field="id">ID</th>
                                                                <th data-field="name" data-sortable="true">Name</th>
																<th data-field="action" >Action</th>

                                                                </thead>
                                                                <tbody>

                                                                <?php view_filtered_table($ward_id); ?>
																<tr>
																<td colspan=3 class="text-center">
																<a href="add_bed.php?ward_id=<?php echo $ward_id; ?>">
																<div class="btn btn-primary" >Add New Bed</div>
																</a>
																</td>
																</tr>	
                                                                </tbody>
                                                            </table>
                                                        </div>
												
                                            </div>
											
											
                                        </div>
                                        </div>
										
										<div class="text-center">
                                        <a href="delete_ward.php?ward_id=<?php echo $ward_id; ?>" class="btn btn-danger btn-fill  " data-toggle="modal" data-target="#myModal">
                                            Delete
                                        </a></div>
                                        
                                        <br><br>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->




    </div>
</div>


</body>

<!--   Core JS Files   -->

<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/material-bootstrap-wizard.js"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!-- Fressh table-->
<script src="assets/js/fresh_table.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--Appointment Slot js-->
<script src="assets/js/appointment_slot.js"></script>
<!--select Dcotor as designation AJAX-->
<script src="assets/js/ajax_doctor.js"></script>
<!-- Load Selected Time -->
<script src="assets/js/load_final_slot.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Drop down javascript -->
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



</html>
