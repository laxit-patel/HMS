<?php
include("assets/modules/global_module.php");
check_token("admin");


if(isset($_GET["id"]))
{
    $d_id = $_GET["id"];
}

if(isset($_GET["msg_t"]))
{
	$alert_success = $_GET["msg_t"];
}
if(isset($_GET["msg_f"]))
{
	$alert_danger = $_GET["msg_f"];
}

if(isset($_SESSION["admin_token"]))
{
    $admin_id = $_SESSION["admin_token"];
}
$result = fetch_data("select * from admin where admin_id= '$admin_id'","result");
$a_data = mysqli_fetch_assoc($result);
$data = mysqli_fetch_assoc(fetch_data("select * from staff where staff_id = '$d_id'","result"));

$age = date_diff(date_create($data["staff_dob"]), date_create('today'))->y;


if($_POST)
{
  print_r($_POST);
  
	$s_email = $_POST['s_email'];
	$s_name = $_POST["s_name"];
	
	$s_phone = $_POST["s_phone"];
	$s_address = $_POST["s_address"];
	$s_city = $_POST["s_city"];
  

    if(update_data("update staff set staff_email = '$s_email',staff_name = '$s_name',staff_phone ='$s_phone',staff_address = '$s_address',staff_city = '$s_city' where staff_id = '$d_id'"))
	{
		$msg = "Details Updated Successfully";
		header("LOCATION:view_staff_profile.php?id=$d_id&msg_t=$msg");
	}
	else
	{
		$msg = "Details Not Updated";
		header("LOCATION:view_staff_profile.php?id=$d_id&msg_f=$msg");
	}
	
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/HMS.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard - Staff Profile</title>

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

    <?php menu($a_data["admin_name"],"staff","view_staff"); ?>

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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>Stsff Profile</a>
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
					
                        <div class="card card-user"><br>
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
                            <div class="image" >
                                <img src="assets/img/HMS_BG.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="assets/img/avatars/<?php if($data["staff_gender"] == "Male"){ echo "male-doc.png"; } if($data["staff_gender"] == "Female"){ echo "female-doc.jpg"; } ?>"   alt="..."/  >

                                        <h4 class="title"><?php echo $data["staff_name"]; if($data["staff_gender"]=="Male"){ echo "&nbsp<img src='assets/img/male.png'>"; }else{ echo "&nbsp<img src='assets/img/female.png'>"; }?><br />
                                            <small><?php echo $data["staff_type"]; ?></small>
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
                                                    <input type="text" name="s_id" class="form-control" disabled value="<?php echo $data["staff_id"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="s_email" class="form-control"  value="<?php echo $data["staff_email"]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Name</label>
                                                    <input type="text" name="s_name" class="form-control"  value="<?php echo $data["staff_name"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <input type="text" name="s_gender" class="form-control"  value="<?php echo $data["staff_gender"]; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" name="s_age" class="form-control" value="<?php echo $age ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" name="s_phone" class="form-control"  value="<?php echo $data["staff_phone"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="s_address" class="form-control"  value="<?php echo $data["staff_address"]; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="s_city" class="form-control"  value="<?php echo $data["staff_city"]; ?>">
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
                <p>You Want to Delete   <span class="label label-danger"><?php echo $data["staff_name"]; ?></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-fill pull-left" data-dismiss="modal">No</button>
                <a href="delete_staff.php?delete_by=<?php echo $admin_id;?>&delete_for=<?php echo $data["staff_id"]?>"><button type="button" class="btn btn-danger btn-fill pull-right" >Yes</button></a>
            </div>
        </div>
    </div>
</div>
<!--  Delete Modal -->

</html>
