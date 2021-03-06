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

$result_p = fetch_data("select * from patient where patient_exist = 0","result");
$result_d = fetch_data("select * from designation","result");
$result_st = fetch_data("select * from staff where staff_exist = 0 and staff_capacity <> 0 ","result");
$result_wd = fetch_data("select * from ward where ward_exist = 0","result");

if($_POST)
{
   $ad_patient = $_POST["admit_patient"];
   $ad_nurse = $_POST["admit_nurse"];
   $ad_ward = $_POST["admit_ward"];


   if($ad_patient == "--Select Patient--")
   {
       $alert_danger =  "Select Patient";
   }
   elseif($ad_nurse == "--Select Nurse--")
   {
       $alert_danger = "Select Nurse";
   }
   elseif($ad_ward == "--Select Ward--")
   {
       $alert_danger = "Select Ward";
   }
   else
   {
       $admission_id = key_engine("admission");
       $admission_bed = $_POST["admit_bed"];
        $admission_date = date("Y-m-d");
        $admit_patient = explode("->",$ad_patient);

       if(admission("insert into admission(admission_id,admission_patient,admission_nurse_assigned,admission_date,admission_bed)
                    values('$admission_id','$admit_patient[0]','$ad_nurse','$admission_date','$admission_bed')"))
       {

           if(update_data("update bed set patient_id = '$admit_patient[0]', staff_id = '$ad_nurse', bed_status = 1 where bed_id = '$admission_bed'"))
           {
              if(update_data("update patient set patient_type = 1, patient_status = 1"))
              {
                   if(alter_capacity("-",$ad_nurse,3))
               {
                   $alert_success = "Patient Admitted";
               }
               else
               {
                   $alert_danger = "Staff Limit Exceed";
               }
              }
              else
              {
                $alert_danger = "Patient Not Altered";
              }
           }
           else
           {
               $alert_danger = "Bed Not Allocated";
           }

       }
       else
       {
           $alert_danger = "Not Added";
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

    <title>Dashboard - Admit Patient</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--Demo css-->
    <link href="assets/css/demo.css" rel="stylesheet"/>
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
    <link href="assets/css/demo.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">

    <?php menu($data["admin_name"],"patient","admit_patient"); ?>

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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>Admit</a>
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
                        <div class="card wizard-card" data-color=<?php theme("class_moving_tab"); ?> id="wizardProfile">
                            <form  name="app_form" method="POST">
                                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Admit Patient
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
                                        <li><a href="#account" data-toggle="tab">Nurse</a></li>
                                        <li><a href="#address" data-toggle="tab">Ward</a></li>
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

                                                    <select name="admit_patient" class="form-control">

                                                        <option  selected="">--Select Patient--</option>
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
                                            <h4 class="info-text"> Select Nurse </h4>

                                            <div class="input-group">
														<span class="input-group-addon">
														  <i class="material-icons">person</i>
														</span>
                                                <div class="form-group label-floating">

                                                    <select name="admit_nurse" class="form-control">

                                                        <option  selected="">--Select Nurse--</option>
                                                         <?php if($result_wd)
                                                        {

                                                            while($row = mysqli_fetch_array($result_st)) {
                                                                echo"<option value='". $row['staff_id'] ."' >".$row['staff_name']."</option>";
                                                            }
                                                        } ?>

                                                    </select>
                                                </div>
                                            </div>





										  
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="address">

                                        <div class="container-fluid">
                                            
											<div class="input-group">
														<span class="input-group-addon">
														  <i class="material-icons">home</i>
														</span>
                                                <div class="form-group label-floating">

                                                    <select name="admit_ward" class="form-control" id="select_ward">

                                                        <option  selected="">--Select Ward--</option>
                                                        <?php if($result_wd)
                                                        {

                                                            while($row = mysqli_fetch_array($result_wd)) {
                                                                echo"<option value='". $row['ward_id'] ."' >".$row['ward_name']."</option>";
                                                            }
                                                        } ?>

                                                    </select>
                                                </div>
												
                                            </div>

                                            <div class="input-group">
														<span class="input-group-addon">
														  <i class="material-icons">hotel</i>
														</span>
                                                <div class="form-group label-floating">

                                                    <select name="admit_bed" class="form-control" id="bed_holder" >


                                                    </select>
                                                </div>

                                            </div>




                                        </div>
										
										
										
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill  btn-wd'  value='Next' id="<?php theme("id_btn"); ?>"/>
                                        <input type='submit' class='btn btn-finish btn-fill  btn-wd '  value='Book' id="<?php theme("id_btn"); ?>"/>
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

        <div id="ward_button">click</div>


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
<!--select Doctor as designation AJAX-->
<script src="assets/js/ajax_doctor.js"></script>
<!--select bed as ward AJAX-->
<script src="assets/js/ajax_ward.js"></script>
<!-- Load Selected Time -->
<script src="assets/js/load_final_slot.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!--Ward Button-->
<script src="assets/js/ward_button.js" type="text/javascript"></script>

<script  src="assets/js/dropdown.js" type="text/javascript" ></script>

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
