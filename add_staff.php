<?php
include("assets/modules/global_module.php");
check_token("admin");

$name = $_SESSION["admin_token"];
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
}
if(isset($_GET["inserted"]))
{
    $alert_success = $_GET["inserted"];
}
elseif(isset($_SESSION["admin_token"]))
{
    $id = $_SESSION["admin_token"];
}
$result = fetch_data("select * from admin where admin_id= '$id'","result");
$data = mysqli_fetch_assoc($result);

if($_POST)
{


    if($_POST['s_name'] == "")
    {
        $alert_danger = "Enter Name";
    }
    elseif($_POST['s_dob'] == "")
    {
        $alert_danger = "Enter DOB";
    }
    elseif($_POST['s_gender'] == "--Select--")
    {
        $alert_danger = "Select Gender";
    }
    elseif($_POST['s_phone'] == "")
    {
        $alert_danger = "Enter Phone Number";
    }
    elseif($_POST['s_city'] == "--Select City--")
    {
        $alert_danger = "Select City";
    }
    elseif($_POST['s_address'] == "")
    {
        $alert_danger = "Enter Address";
    }
    elseif($_POST['s_email'] == "")
    {
        $alert_danger = "Enter Email";
    }
    elseif($_POST['s_password'] == "")
    {
        $alert_danger = "Enter Password";
    }
    elseif($_POST['s_type'] == "--Select--" )
    {
        $alert_danger = "Choose Type";
    }
    else
    {
        $id = key_engine("staff");
        $d_old = explode("-",$_POST['s_dob']);
        $s_dob = $d_old[0]."-".$d_old[1]."-".$d_old[2];
        $id = key_engine('staff');
        $name = $_POST['s_name'];
        $gender = $_POST['s_gender'];
        $email = $_POST['s_email'];
        $phone = $_POST['s_phone'];
        $city = $_POST['s_city'];
        $address = $_POST['s_address'];
        $password = $_POST['s_password'];
        $type = $_POST['s_type'];

        if(insert("insert into staff(staff_id,staff_name,staff_gender,staff_email,staff_phone,staff_dob,staff_city,staff_address,staff_password,staff_type)
                                    values( '$id','$name','$gender','$email','$phone','$s_dob','$city','$address','$password','$type' )") == true)
        {
            $msg = "<b>".$name."</b> Added";
            header("LOCATION:add_staff.php?inserted=$msg&id=$id ");
        }
        else
        {
            echo $alert_danger = "Staff Insertion Error";
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

    <title>Dashboard - Add Staff</title>

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

    <?php menu($data["admin_name"],"staff","add_staff"); ?>

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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>Add Staff</a>
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

                            <form name="add_staff" method="POST">
                                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3>Staff</h3>
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
                                        echo "<div class='alert alert-danger'     >
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
                                                    <label class="control-label">Staff's Id</label>
                                                    <input type="text" name="s_id" value="<?php echo key_engine("staff"); ?>" class="form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">account_circle</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Staff's Name</label>
                                                    <input type="text" name="s_name" value="<?php if(isset($s_name)){ echo $s_name; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">today</i>
                                                </span>
                                                <div class="form-group label-floating">

                                                    <input type="date" name="s_dob" value="<?php if(isset($s_dob)){ echo $s_dob; }?>" class="datepicker form-control" placeholder="CHOOSE BIRTHDATE" />
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">accessibility</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Gender</label>
                                                    <select name="s_gender" class="form-control">
                                                        <option>--Select--</option>
                                                        <option <?php if(isset($s_gender)){ if($s_gender == "Male"){echo "selected=true";}}?> >Male</option>
                                                        <option <?php if(isset($s_gender)){ if($s_gender == "Female"){echo "selected=true";}}?> >Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">call</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label"> Phone</label>
                                                    <input type="text" name="s_phone" value="<?php if(isset($s_phone)){ echo $s_phone; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">place</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">city</label>
                                                    <input type="text" name="s_city" value="<?php if(isset($s_city)){ echo $s_city; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">my_location</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Adress</label>
                                                    <input type="text" name="s_address" value="<?php if(isset($s_address)){ echo $s_address; }?>" class="form-control">
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
                                                    <label class="control-label">Staff Email</label>
                                                    <input type="email" name="s_email" value="<?php if(isset($s_email)){ echo $s_email; }?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input type="text" name="s_password" value="<?php if(isset($s_password)){ echo $s_password; }?>" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="material-icons">layers</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Staff Type</label>
                                                    <select name="s_type" class="form-control">
                                                        <option>--Select--</option>
                                                        <option>Nurse</option>
                                                        <option>Receptionist</option>
                                                        <option>Wardboy</option>
                                                    </select>
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
