<?php
include("assets/modules/global_module.php");
include("assets/modules/theme.php");

check_token("admin");

$name = $_SESSION["admin_token"];
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
}

if(isset($_COOKIE["alert_true"]))
{
    $alert_success = $_COOKIE["alert_true"];
    setcookie("alert_true","",time()-10);
}
if(isset($_COOKIE["alert_false"]))
{
    $alert_danger = $_COOKIE["alert_false"];
    setcookie("alert_false","",time()-10);
}


elseif(isset($_SESSION["admin_token"]))
{
    $id = $_SESSION["admin_token"];
}
$result = fetch_data("select * from admin where admin_id= '$id'","result");
$data = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/HMS.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard - View Doctor</title>

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
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

</head>
<body>

<div class="wrapper">

    <?php menu($data["admin_name"],"doctor","view_doctor"); ?>

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
                    <a class="navbar-brand" href="#">Dashboard<i class="pe-7s-angle-right"></i>View Doctor</a>
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

        <br>
		<div class="row">
		<div class=col-md-1></div>
			<div class="col-md-10">


                  <br>
                                    <div class="container-fluid text-center" id="alert_box" >
                                        <?php
                                        if(isset($alert_success))
                                        {
                                            echo "<div class='container-fluid'><div class='alert alert-success' style='color:black' id='alert_body'>
                                           <div class='container-fluid'>
                                       <div class='alert-icon'>
                                        <i class='material-icons'>done_all</i>
                                      </div>
                                     
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
                                            echo "<div class='alert alert-danger' id='alert_body'>
                                           <div class='container-fluid'>
                                            
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
			<div class=col-md-1></div>
		</div>
		
        <div class="container-fluid">
		
            <div class="row">
                <div class="col-md-12">

                    <div class="fresh-table <?php theme("class_table"); ?>" >
                        <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                                Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                        -->



                        <table id="fresh-table" class="table">
						
                            <thead>
                            <th data-field="id">ID</th>
                            <th data-field="name" data-sortable="true">Name</th>

                            <th data-field="country" data-sortable="true">Designation</th>
                            <th data-field="city">E-mail</th>
                            <th  data-field="actions"  >Actions</th>
                            </thead>
                            <tbody>

                            <?php view_table("doctor"); ?>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>




    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Autohide Alet -->
<script src="assets/js/alert_autohide.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-table.js"></script>

<!-- Fressh table-->
<script src="assets/js/fresh_table.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        

    });
</script>

</html>
