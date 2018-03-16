<?php
include("assets/modules/global_module.php");
include("assets/modules/theme.php");
check_token("patient");
$p_id = $_SESSION["login_token"];
$data = mysqli_fetch_assoc(fetch_data("select * from patient where patient_id = '$p_id'","result"));


?>

	<!doctype html>
<html lang="en">
<head>

    <title>Rudani Hospital</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/materialize.css" rel="stylesheet">

</head>

<body>

   <nav>
    <div class="nav-wrapper">
     <div class="container-fluid teal">
 <a href="index.php">
  <div class="chip">
             <img src="assets/img/HMS.png" alt="Contact Person">
     Rudani Hospital
         </div>
         </a>

         <b> > </b>


         <div class="chip">
    <img src="assets/img/avatars/female-doc.jpg" alt="Contact Person">
    <?php echo $data['patient_name']; ?>
  </div>

     </div>
    </div>
  </nav>

<div class="container-fluid center-align">
    <h1 class="flow-text">Dashboard</h1>
</div>

  <div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="card z-depth-0">
        <div class="card-image">
          <img src="assets/img/004-christmas-day.png">

          <a href="patient_appointment.php" class="btn-floating btn-large halfway-fab waves-effect waves-light red teal"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h2 class="flow-text text-center">Appointment</h2>
        </div>
      </div>
    </div>

      <div class="col-md-3">
      <div class="card z-depth-0">
        <div class="card-image ">
          <img src="assets/img/curriculum.png">

          <a class="btn-floating btn-large halfway-fab waves-effect waves-light red teal"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h2 class="flow-text text-center">Profile</h2>
        </div>
      </div>
    </div>

      <div class="col-md-3">
      <div class="card z-depth-0" >
        <div class="card-image">
          <img src="assets/img/002-star.png">

          <a class="btn-floating btn-large halfway-fab waves-effect waves-light red teal"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
            <h2 class="flow-text text-center">FeedBack</h2>
        </div>
      </div>
    </div>

      <div class="col-md-3">
      <div class="card z-depth-0 ">
        <div class="card-image">
          <img src="assets/img/001-clipboard.png">

          <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h2 class="flow-text text-center">Report</h2>
        </div>
      </div>
    </div>

  </div>




  </div>


</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/materialize.js"></script>
</html>
