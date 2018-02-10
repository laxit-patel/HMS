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
$result_d = fetch_data("select designation_name from designation","result");

if($_POST)
{
    $doctor_id = key_engine("doctor");
    $d_name = $_POST["d_name"];
    $dr_dob = $_POST["dr_dob"];
    $d_gender = $_POST["d_gender"];
    $d_phone = $_POST["d_phone"];
    $d_city = $_POST["d_city"];
    $d_address = $_POST["d_address"];
    $d_designation = $_POST["d_designation"];
    $d_email = $_POST["d_email"];
    $d_password = $_POST["d_password"];



    if($doctor_id == "")
    {
        $alert_danger = "Enter Id";
    }
    elseif($d_name == "")
    {
        $alert_danger = "Enter Name";
    }
    elseif($dr_dob == "")
    {
        $alert_danger = "Enter DOB";
    }
    elseif($d_gender == "--Select--")
    {
        $alert_danger = "Select Gender";
    }
    elseif($d_phone == "")
    {
        $alert_danger = "Enter Phone Number";
    }
    elseif($d_city == "--Select City--")
    {
        $alert_danger = "Select City";
    }
    elseif($d_address == "")
    {
        $alert_danger = "Enter Address";
    }
    elseif($d_email == "")
    {
        $alert_danger = "Enter Email";
    }
    elseif($d_password == "")
    {
        $alert_danger = "Enter Password";
    }
    elseif($d_designation == "--Select Designation--")
    {
        $alert_danger = "Enter Designation";
    }
    else
    {
        $d_old = explode("/",$dr_dob);

        $d_dob = $d_old[2].$d_old[0].$d_old[1];
        $slot = key_engine('slot');

        if(add_doctor("insert into doctor(doctor_id,doctor_name,doctor_gender,doctor_email,doctor_phone,doctor_dob,doctor_city,doctor_address,doctor_password,doctor_designation,slot_id)
                                         values('$doctor_id','$d_name','$d_gender','$d_email','$d_phone','$d_dob','$d_city','$d_address','$d_password','$d_designation','$slot')"))
        {
            if(add_slot($slot,$doctor_id)) {
                header("LOCATION:add_doctor.php");
            }
            else
            {
                echo "slot Generation Failed";
            }
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

    <title>Dashboard - Add Doctor</title>

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

    <?php menu($data["admin_name"],"doctor","add_doctor"); ?>


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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>Add Doctor</a>
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
                                        Add Doctor
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
                                                    <label class="control-label">Docotr's Id</label>
                                                    <input type="text" name="docotr_id" value="<?php echo key_engine("doctor"); ?>" class="form-control" disabled>


                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">account_circle</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Doctor's Name</label>
                                                    <input type="text" name="d_name" value="<?php if(isset($d_name)){ echo $d_name; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">today</i>
                                                </span>
                                                <div class="form-group label-floating">

                                                    <input type="date" name="dr_dob" value="<?php if(isset($dr_dob)){ echo $dr_dob; }?>" class="datepicker form-control" placeholder="Enter Birthdate" />
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">accessibility</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Gender</label>
                                                    <select name="d_gender" class="form-control">
                                                        <option>--Select--</option>
                                                        <option <?php if(isset($d_gender)){ if($d_gender == "Male"){echo "selected=true";}}?> >Male</option>
                                                        <option <?php if(isset($d_gender)){ if($d_gender == "Female"){echo "selected=true";}}?> >Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">call</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Doctor's Phone</label>
                                                    <input type="text" name="d_phone" value="<?php if(isset($d_phone)){ echo $d_phone; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">place</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">city</label>
                                                    <select name="d_city" class="form-control">
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
                                                    <input type="text" name="d_address" value="<?php if(isset($d_address)){ echo $d_address; }?>" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <div class="container-fluid">

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">school</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Designation</label>
                                                    <select name="d_designation" class="form-control">
                                                        <option>--Select Designation--</option>
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

                                            <div class="input-group ">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Doctor's Email</label>
                                                    <input type="email" name="d_email" value="<?php if(isset($d_email)){ echo $d_email; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input type="text" name="d_password" value="<?php if(isset($d_password)){ echo $d_password; }?>" class="form-control" />
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
