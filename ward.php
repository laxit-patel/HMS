<?php
include("assets/modules/global_module.php");
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
$result = fetch_data("select * from admin where admin_id= '$id'","result");
$data = mysqli_fetch_assoc($result);

if($_POST)
{
    $designation = $_POST["designation"];
    $designation_id = key_engine("designation");
    if($designation == "")
    {
        $alert_danger = "Enter Designation";
    }
    else
    {
        if(add_designation("insert into designation(designation_id,designation_name)values('$designation_id','$designation')"))
        {
            $alert_success = "Designation Added";
        }
        else
        {
            $alert_danger = "Error";
        }
    }
}

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

    <!--fresh table-->
    <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/waterfall.gif" >

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper" id="">
            <div class="logo">
                <a href="#" class="simple-text">
                    <?php echo $data["admin_name"];?>
                </a>
            </div>

            <ul class="nav" >
                <li >
                    <a href="dashboard_admn.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li>
                    <a href="add_patient.php" >
                        <i class="pe-7s-user"></i>
                        <p>Patient</p>
                    </a>

                </li>
                <li >
                    <a href="add_appointment.php">
                        <i class="pe-7s-note2"></i>
                        <p>Appointment</p>
                    </a>

                </li>
                <li >
                    <a href="add_doctor.php">
                        <i class="pe-7s-id"></i>
                        <p>Doctor</p>
                    </a>

                </li>
                <li >
                    <a href="add_receptionist.php">
                        <i class="pe-7s-monitor"></i>
                        <p>Receptionist</p>
                    </a>
                </li>
                <li>
                    <a href="designation.php">
                        <i class="pe-7s-study"></i>
                        <p>Designation</p>
                    </a>
                </li>
                <li class="active">
                    <a href="ward.php">
                        <i class="pe-7s-culture"></i>
                        <p>Ward</p>
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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>Ward</a>
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


        <!--   Big container   -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="purple" id="wizardProfile">
                            <form name="designation_form" method="POST">
                                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <?php

                                    if(isset($alert_success))
                                    {
                                        echo "<div class='container-fluid'><div class='alert alert-success' style='margin-bottom:-7%;'>
               <div class='container-fluid'>
           <div class='alert-icon'>
            <i class='material-icons'>error_outline</i>
          </div>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
          </button>
                   <b>$alert_success</b> 
              </div>
          </div></div>";
                                    }
                                    else
                                    {
                                        echo "";
                                    }

                                    if(isset($alert_danger))
                                    {
                                        echo "<div class='alert alert-danger' style='margin-bottom:-7%;'>
                                        <div class='container-fluid'>
                                            <div class='alert-icon'>
                                                <i class='material-icons'>error_outline</i>
                                            </div>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                                            </button>
                                            <b>Error Alert:</b> $alert_danger
                                        </div>
                                    </div>";
                                    }
                                    else
                                    {
                                        echo "";
                                    }?>
                                    <h3 class="wizard-title">
                                        Ward
                                    </h3>

                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#about" data-toggle="tab">Add</a></li>
                                        <li><a href="#account" data-toggle="tab">View</a></li>

                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="about">
                                        <div class="container-fluid">

                                            <div class="input-group">

                                                <i class="material-icons">home</i>
                                                <span class="input-group-addon"></span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ward</label>
                                                    <input type="text" class="form-control" name="designation" />

                                                </div>
                                            </div>
                                            <div class="input-group">


                                                <span class="input-group-addon"></span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Bed Capacity</label>
                                                    <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>

                                            <input type='submit' class='btn btn-block btn-fill btn-success btn-wd '  value='Add' style="background-color:#9C27B0;"/>



                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <div class="container-fluid">



                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="fresh-table full-color-purple" >
                                                        <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                                                                Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                                                        -->



                                                        <table id="fresh-table" class="table">
                                                            <thead>
                                                            <th data-field="id">ID</th>
                                                            <th data-field="name" data-sortable="true">Ward</th>
                                                            <th data-field="name" data-sortable="true">Beds</th>
                                                            <th data-field="action" >Action</th>

                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                            <td>18_ward_0</td>
                                                                <td>1</td>

                                                                <td>1</td>
                                                                <td><i class="material-icons">delete_forever</i></td>

                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>


                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                </div>
                                <div class="wizard-footer">




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
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/material-bootstrap-wizard.js"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-table.js"></script>

<!-- Fressh table-->
<script src="assets/js/fresh_table.js"></script>

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

</html>
