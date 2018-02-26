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

if(isset($_GET["msg_t"]))
{
	$alert_success = $_GET["msg_t"];
}
if(isset($_GET["msg_f"]))
{
	$alert_danger = $_GET["msg_f"];
}

if(isset($_GET["msg"]))
{
    $alert_success = $_GET["msg"];
}

$result = fetch_data("select * from admin where admin_id= '$id'","result");
$data = mysqli_fetch_assoc($result);

if($_POST)
{
    $p_id = key_engine("patient");
    $p_name = $_POST["p_name"];
    $p_dob = $_POST["p_dob"];
    $p_gender = $_POST["p_gender"];
    $p_phone = $_POST["p_phone"];
    $p_city = $_POST["p_city"];
    $p_address = $_POST["p_address"];
    $p_blood = $_POST["p_blood"];
    $relative_name = $_POST["relative_name"];
    $relative_contact = $_POST["relative_contact"];

    if($p_id == "")
    {
        $alert_danger = "Enter Id";
    }
    elseif($p_name == "")
    {
        $alert_danger = "Enter Name";
    }
    elseif($p_dob == "")
    {
        $alert_danger = "Enter DOB";
    }
    elseif($p_gender == "--Select--")
    {
        $alert_danger = "Select Gender";
    }
    elseif($p_phone == "")
    {
        $alert_danger = "Enter Phone Number";
    }
    elseif($p_city == "--Select City--")
    {
        $alert_danger = "Select City";
    }
    elseif($p_address == "")
    {
        $alert_danger = "Enter Adress";
    }
	elseif($p_blood == '--Blood Group--')
	{
		$alert_danger = "Select Blood Group";
	}
    else
    {
		
        $d_old = explode("/",$p_dob);
        $p_dob = $d_old[0]."/".$d_old[1]."/".$d_old[2];
		
		
		
        $loc = $p_city."~".$p_address;
            $raw = explode("_",$id);
            if($raw[1] == "admn")
            {
                $by = "Admin";
            }
            elseif($raw[1] == "dctr")
            {
                $by = "Doctor";
            }
            elseif($raw[1] == "rcpt")
            {
                $by = "Receptionnist";
            }
            if(add_patient("insert into patient(patient_id,patient_name,patient_gender,patient_phone,patient_dob,patient_address,relative_name,relative_contact,patient_blood_group,added_by) values('$p_id','$p_name','$p_gender','$p_phone','$p_dob','$loc','$relative_name','$relative_contact','$p_blood','$by')"))
            {
                $msg = "Patient ".$p_name." Added";
                $p_name = "";
                $p_dob = "";
                $p_gender ="";
                $p_phone = "";
                $p_city = "";
                $p_address ="";
                
                $relative_name = "";
                $relative_contact ="";

                header("LOCATION:add_patient.php?msg_t=$msg");
            }
			else
			{
				$alert_danger = "Doctor Not Added";
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

    <title>Dashboard - Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


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

    <?php menu($data["admin_name"],"patient","add_patient"); ?>

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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>Add Patient</a>

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

                            <form name="add_patient" method="POST">
                                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Add patient
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
                                        <li><a href="#about" data-toggle="tab">Details</a></li>
                                        <li><a href="#account" data-toggle="tab">Login</a></li>

                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="about">
                                        <div class="container-fluid">


                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">vpn_key</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Patient's Id</label>
                                                    <input type="text" name=p_id value="<?php echo key_engine("patient"); ?>" class="form-control" readonly>


                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">account_circle</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Patient's Name</label>
                                                    <input type="text" name="p_name" value="<?php if(isset($p_name)){ echo $p_name; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">today</i>
                                                </span>
                                                <div class="form-group label-floating">

                                                    <input type="date" name="p_dob" value="<?php if(isset($p_dob)){ echo $p_dob; }?>" class="datepicker form-control" placeholder="Enter Birthdate" />
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">accessibility</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Gender</label>
                                                    <select name="p_gender" class="form-control">
                                                        <option>--Select--</option>
                                                        <option <?php if(isset($p_gender)){ if($p_gender == "Male"){echo "selected=true";}}?> >Male</option>
                                                        <option <?php if(isset($p_gender)){ if($p_gender == "Female"){echo "selected=true";}}?> >Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">call</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Patient's Phone</label>
                                                    <input type="text" name="p_phone" value="<?php if(isset($p_phone)){ echo $p_phone; }?>" class="form-control">
                                                </div>
                                            </div>

                                            

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <div class="container-fluid">

                                           <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">invert_colors</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Blood Group</label>
                                                    <select name="p_blood" class="form-control">
                                                        <option>--Blood Group--</option>
                                                        <option>A-</option>
														<option>A+</option>
														<option>B-</option>
														<option>B+</option>
														<option>O-</option>
														<option>O+</option>
														<option>AB-</option>
														<option>AB+</option>
														
                                                    </select>
                                                </div>
                                            </div>
										   
											<div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">place</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">city</label>
                                                    <select name="p_city" class="form-control">
                                                        <option>--Select City--</option>
                                                        <option>Bhuj</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">my_location</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Adress</label>
                                                    <input type="text" name="p_address" value="<?php if(isset($p_address)){ echo $p_address; }?>" class="form-control">
                                                </div>
                                            </div>


                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">supervisor_account</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Relative</label>
                                                    <input type="text" name="relative_name" value="<?php if(isset($relative_name)){ echo $relative_name; }?>" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">contact_phone</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Relative's phone</label>
                                                    <input type="text" name="relative_contact" value="<?php if(isset($relative_contact)){ echo $relative_contact; }?>" class="form-control" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' style="background-color:#9C27B0"/>
                                        <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd ' value='Add' style="background-color:#9C27B0"/>
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
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
<script src="assets/js/jquery.validate.min.js"></script>

<script src="assets/js/material-bootstrap-wizard.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>


<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

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
