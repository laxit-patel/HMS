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
    $r_id = key_engine("receptionist");
    $r_name = $_POST["r_name"];
    $r_dob = $_POST["r_dob"];
    $r_gender = $_POST["r_gender"];
    $r_phone = $_POST["r_phone"];
    $r_city = $_POST["r_city"];
    $r_address = $_POST["r_address"];
    $r_email = $_POST["r_email"];
    $r_password = $_POST["r_password"];



    if($r_id == "")
    {
        $alert_danger = "Enter Id";
    }
    elseif($r_name == "")
    {
        $alert_danger = "Enter Name";
    }
    elseif($r_dob == "")
    {
        $alert_danger = "Enter DOB";
    }
    elseif($r_gender == "--Select--")
    {
        $alert_danger = "Select Gender";
    }
    elseif($r_phone == "")
    {
        $alert_danger = "Enter Phone Number";
    }
    elseif($r_city == "--Select City--")
    {
        $alert_danger = "Select City";
    }
    elseif($r_address == "")
    {
        $alert_danger = "Enter Address";
    }
    elseif($r_email == "")
    {
        $alert_danger = "Enter Email";
    }
    elseif($r_password == "")
    {
        $alert_danger = "Enter Password";
    }
    else
    {
        $d_old = explode("/",$r_dob);
        $r_dob = $d_old[2]."/".$d_old[0]."/".$d_old[1];
        if(add_receptionist("insert into receptionist(receptionist_id,receptionist_name,receptionist_gender,receptionist_email,receptionist_phone,receptionist_dob,receptionist_city,receptionist_address,receptionist_password)
                                         values('$r_id','$r_name','$r_gender','$r_email','$r_phone','$r_dob','$r_city','$r_address','$r_password')"))
        {
            header("LOCATION:add_receptionist.php");
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

    <title>Dashboard - Receptionist</title>

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
                <li class="active">
                    <a href="add_receptionist.php">
                        <i class="pe-7s-id"></i>
                        <p>Receptionist</p>
                    </a>
                    <ul>
                        <li class="active">
                            <a href="add_receptionist.php" >
                                <i class="pe-7s-add-user"></i>
                                <p>Add Receptionist</p>
                            </a>
                        </li>
                        <li >
                            <a href="view_receptionist.php" >
                                <i class="pe-7s-search"></i>
                                <p>View Receptionist</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="designation.php">
                        <i class="pe-7s-study"></i>
                        <p>Designation</p>
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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>View Appointment</a>
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
                                    }
                                    ?><br><br>
                                    <h3 class="wizard-title">
                                        Add Receptionist
                                    </h3>

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
                                                    <label class="control-label">Receptionist's Id</label>
                                                    <input type="text" name="r_id" value="<?php echo key_engine("receptionist"); ?>" class="form-control" disabled>


                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">account_circle</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Receptionist's Name</label>
                                                    <input type="text" name="r_name" value="<?php if(isset($r_name)){ echo $r_name; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">today</i>
                                                </span>
                                                <div class="form-group label-floating">

                                                    <input type="text" name="r_dob" value="<?php if(isset($r_dob)){ echo $r_dob; }?>" class="datepicker form-control" placeholder="Enter Birthdate" />
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">accessibility</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Gender</label>
                                                    <select name="r_gender" class="form-control">
                                                        <option>--Select--</option>
                                                        <option <?php if(isset($r_gender)){ if($r_gender == "Male"){echo "selected=true";}}?> >Male</option>
                                                        <option <?php if(isset($r_gender)){ if($r_gender == "Female"){echo "selected=true";}}?> >Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">call</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Receptionist's Phone</label>
                                                    <input type="text" name="r_phone" value="<?php if(isset($r_phone)){ echo $r_phone; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">place</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">city</label>
                                                    <select name="r_city" class="form-control">
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
                                                    <input type="text" name="r_address" value="<?php if(isset($r_address)){ echo $r_address; }?>" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <div class="container-fluid">



                                            <div class="input-group ">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Doctor's Email</label>
                                                    <input type="email" name="r_email" value="<?php if(isset($r_email)){ echo $r_email; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input type="text" name="r_password" value="<?php if(isset($r_password)){ echo $r_password; }?>" class="form-control" />
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' style="background-color:#9C27B0"/>
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
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->

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
