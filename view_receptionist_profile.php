<?php
include("assets/modules/global_module.php");
check_token("admin");


if(isset($_GET["id"]))
{
    $r_id = $_GET["id"];
}
if(isset($_SESSION["admin_token"]))
{
    $admin_id = $_SESSION["admin_token"];
}
$result = fetch_data("select * from admin where admin_id= '$admin_id'","result");
$a_data = mysqli_fetch_assoc($result);
$data = mysqli_fetch_assoc(fetch_data("select * from receptionist where receptionist_id = '$r_id'","result"));
$age = date_diff(date_create($data["receptionist_dob"]), date_create('today'))->y;


if($_POST)
{
    $r_email = $_POST["r_email"];
    $r_name = $_POST["r_name"];
    $r_gender = $_POST["r_gender"];

    $r_phone = $_POST["r_phone"];
    $r_address = $_POST["r_address"];
    $r_city = $_POST["r_city"];


    echo update_data("update receptionist set receptionist_email = '$r_email',receptionist_name = '$r_name',receptionist_gender = '$r_gender',receptionist_phone =  '$r_phone',receptionist_address = '$r_address',receptionist_city = '$r_city' where receptionist_id = '$r_id'");
    header("LOCATION:view_receptionist_profile.php?id=$r_id");
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/HMS.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard - Profile</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--fresh table-->


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/waterfall.gif" >

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <?php echo $a_data["admin_name"]?>
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="dashboard_admn.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li >
                    <a href="add_patient.php" >
                        <i class="pe-7s-user"></i>
                        <p>Patient</p>
                    </a>

                </li>
                <li>
                    <a href="add_appointment.php">
                        <i class="pe-7s-note2"></i>
                        <p>Appointment</p>
                    </a>
                </li>
                <li>
                    <a href="add_doctor.php">
                        <i class="pe-7s-id"></i>
                        <p>Doctor</p>
                    </a>

                </li>
                <li  class="active">
                    <a href="add_receptionist.php">
                        <i class="pe-7s-monitor"></i>
                        <p>Receptionist</p>
                    </a>
                    <ul>
                        <li >
                            <a href="add_receptionist.php" >
                                <i class="pe-7s-add-user"></i>
                                <p>Add Receptionist</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="view_receptionist.php" >
                                <i class="pe-7s-search"></i>
                                <p>View Receptionist</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="add_designation.php">
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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>Profile</a>
                </div>
                <div class="collapse navbar-collapse">


                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a href="logout.php?for=<?php echo $admin_id; ?>">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-user">
                            <div class="image" >
                                <img src="assets/img/HMS_BG.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="assets/img/avatars/014-man-12.png" alt="..."/  >

                                        <h4 class="title"><?php echo $data["receptionist_name"]; if($data["receptionist_gender"]=="Male"){ echo "&nbsp<img src='assets/img/male.png'>"; }else{ echo "&nbsp<img src='assets/img/female.png'>"; }?><br />
                                            <small><?php echo $data["receptionist_email"]; ?></small>
                                        </h4>
                                    </a>
                                </div>
                                <hr>

                                <div class="content">
                                    <form method="POST" name="admin_edit_patient">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <input type="text" name="r_id" class="form-control" disabled value="<?php echo $data["receptionist_id"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="r_email" class="form-control"  value="<?php echo $data["receptionist_email"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Name</label>
                                                    <input type="text" name="r_name" class="form-control"  value="<?php echo $data["receptionist_name"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <input type="text" name="r_gender" class="form-control"  value="<?php echo $data["receptionist_gender"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" name="r_age" class="form-control" value="<?php echo $age ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" name="r_phone" class="form-control"  value="<?php echo $data["receptionist_phone"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="r_address" class="form-control"  value="<?php echo $data["receptionist_address"]; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="r_city" class="form-control"  value="<?php echo $data["receptionist_city"]; ?>">
                                                </div>
                                            </div>

                                        </div>






                                        <a class="btn btn-danger btn-fill pull-left" data-toggle="modal" data-target="#myModal">
                                            Delete
                                        </a>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                                        <br><br>
                                    </form>
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

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script type="text/javascript" src="assets/js/bootstrap-table.js"></script>



<!-- Fressh table-->
<script src="assets/js/fresh_table.js"></script>

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

<!-- Delete Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm</h4>
            </div>
            <div class="modal-body">
                <p>You Want to Delete   <span class="label label-danger"><?php echo $data["receptionist_name"]; ?></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-fill pull-left" data-dismiss="modal">No</button>
                <a href="delete_receptionist.php?delete_by=<?php echo $admin_id;?>&delete_for=<?php echo $data["receptionist_id"]?>"><button type="button" class="btn btn-danger btn-fill pull-right" >Yes</button></a>
            </div>
        </div>
    </div>
</div>
<!--  Delete Modal -->

</html>
