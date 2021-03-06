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
$result = fetch_data("select * from admin where admin_id= '$id'","result");
$data = mysqli_fetch_assoc($result);
include("assets/modules/db_config.php");

$result_p = fetch_data("select patient_id,patient_name from patient where patient_exist = 0","result");
$result_d = fetch_data("select designation_name from designation","result");
$result_dr = fetch_data("select doctor_name from doctor where doctor_exist = 0","result");

if($_POST)
{

    $p_data = explode("->",$_POST["ap_patient"]);
    $patient = $p_data[0];
    $doctor = $_POST["ap_doctor"];
    $time = $_POST["ap_time"];

    if($patient == "")
    {
        $alert_danger = "Choose Patient";
    }
    elseif($doctor == "")
    {
        $alert_danger = "Choose Doctor";
    }
    elseif($time == " ")
    {
        $alert_danger = "Select Slot";
    }
    else
    {

		

        $id = key_engine("appointment");
        $full_time = explode(",",$time);
        $date = $full_time[0];
        $slot = $full_time[2];

       if(insert("insert into appointment(appointment_id,appointment_for,appointment_by,appointment_date,appointment_slot)
                                          values('$id','$doctor','$patient','$date','$slot')"))
        {
            if(book_slot($slot,$doctor))
            {
                $alert_success = "Appointment Booked";
            }
            else
            {
                $alert_danger = "Slot Updation Failed";
            }
        }
        else
        {
            $alert_danger = "Error in Booking";
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

    <title>Dashboard - Add Appointment</title>

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

    <?php menu($data["admin_name"],"appointment","add_appointment"); ?>

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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>Add Appointment</a>
                </div>
                <div class="collapse navbar-collapse">


                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a href="logout.php?for=<?php echo $data["admin_id"] ?>">
                                <p>Log out</p>
                            </a>
                        </li>

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
                        <div class="card wizard-card" data-color="<?php theme("class_moving_tab"); ?>" id="wizardProfile">
                            <form  name="app_form" method="POST">
                                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Add Appointment
                                    </h3>
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
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#about" data-toggle="tab">Patient</a></li>
                                        <li><a href="#account" data-toggle="tab">Doctor</a></li>
                                        <li><a href="#address" data-toggle="tab">Date</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="about">
                                        <div class="container-fluid">
                                            <h4 class="info-text"> Select Patient </h4>



                                            <div class="input-group">
														<span class="input-group-addon">
														  <i class="material-icons">loupe</i>
														</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Patient</label>
                                                    <select name="ap_patient" class="form-control">

                                                        <option disabled="" selected=""></option>
                                                        <?php if($result_p)
                                                        {

                                                            while($row = mysqli_fetch_array($result_p)) {
                                                                echo "<option >".$row["patient_id"]."->".$row["patient_name"]."</option>";
                                                            }
                                                        } ?>

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
														  <i class="material-icons">loupe</i>
														</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Specialization</label>
                                                    <select  class="form-control" id="js_designation">
                                                        <option disabled="" selected=""></option>
                                                        <?php

                                                        if($result_d)
                                                        {

                                                            while($row_d = mysqli_fetch_array($result_d)) {
                                                                echo "<option>".$row_d["designation_name"]."</option>";
                                                            }
                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="input-group">
														<span class="input-group-addon">
														  <i class="material-icons">streetview</i>
														</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Doctor</label>
                                                    <select name="ap_doctor" class="form-control" id="js_doc_list">
                                                        <option disabled="" selected=""></option>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="address">

                                        <div class="container-fluid">
                                            <p id="slot-container"></p>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">av_timer</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="appointment_time">Time</label>
                                                    <input type="text" name="ap_time" id="appointment_time"  value=" " class="form-control" readonly="readonly" />

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill  btn-wd'  value='Next' id="<?php theme("id_btn"); ?>"/>
                                        <input type='submit' class='btn btn-finish btn-fill btn-wd '  value='Book' id="<?php theme("id_btn"); ?>"/>
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd'  value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
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
<!-- Load Selected Time -->
<script src="assets/js/load_final_slot.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!--select Dcotor as designation AJAX-->
<script src="assets/js/ajax_doctor.js"></script>
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
