<?php
include("assets/modules/global_module.php");
include("assets/modules/theme.php");
check_token("patient");
$p_id = $_SESSION["login_token"];
$data = mysqli_fetch_assoc(fetch_data("select * from patient where patient_id = '$p_id'","result"));


include("assets/modules/db_config.php");


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
     Home
         </div>
         </a>

         <b> > </b>

        <a href="dashboard_ptnt.php">
         <div class="chip">
    <img src="assets/img/avatars/female-doc.jpg" alt="Contact Person">
    <?php echo $data['patient_name']; ?>
  </div>
        </a>

          <b> > </b>

          <div class="chip">
    <img src="assets/img/004-christmas-day.png" alt="Contact Person">
    Appointment
  </div>

     </div>
    </div>
  </nav>

    <br><br><br>


  <div class="container text-center z-depth-5">
 <h1 class="flow-text">Take Appointment</h1>
      <form class="container ">

        <div class="row">

            <div class="col-md-6">
  <select class="browser-default" id="js_designation">
    <option value="" disabled selected>Select Designation</option>
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
           <div class="col-md-6">
  <select class="browser-default" id="js_doc_list">
    <option value="" disabled selected>Select Doctor</option>
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
          <div class="row text-center">

              <div class="col-md-12 z-depth-5" id="slot">



              </div>
          </div>


     <div class="row">
    <form class="col-md-12">
      <div class="row">
        <div class="input-field col-md-8">

          <input  type=text  id="appointment_time" value=" " type="text" readonly>
          <label for="first_name">Time</label>
        </div>
        <div class="input-field col-md-4">

          <input  type="submit" class="waves-effect waves-light btn-large teal" value="Book">

        </div>
      </div>
    </form>
  </div>




      </form>

  </div>


</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/materialize.js"></script>
    <!--select Dcotor as designation AJAX-->
    <script src="assets/js/ajax_doctor.js"></script>
    <!--Appointment Slot js-->
    <script src="assets/js/appointment_slot_patient.js"></script>
    <!-- Load Selected Time -->
    <script src="assets/js/load_final_slot.js"></script>
</html>
