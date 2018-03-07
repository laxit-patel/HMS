<?php 
include("assets/modules/global_module.php"); 
include("assets/modules/theme.php");

if($_POST)
{
 
  $p_id = key_engine("patient");
  $p_name = $_POST["p_name"];
  $p_dob = $_POST["p_dob"];
  $p_gender = $_POST["p_gender"];
  $p_phone = $_POST["p_phone"];
  $p_city = $_POST["p_city"];
  $p_address = $_POST["p_address"];
  $p_email = $_POST["p_email"];
  $p_password = $_POST["p_password"];
  $p_repassword = $_POST["p_repassword"];


  echo $p_id."<br>";
  echo $p_name."<br>";
  echo $p_dob."<br>";
  echo $p_gender."<br>";
  echo $p_phone."<br>";
  echo $p_city."<br>";
  echo $p_address."<br>";
  echo $p_email."<br>";
  echo $p_password."<br>";
  echo $p_repassword."<br>";


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
  elseif($p_email == "")
  {
      $alert_danger = "Enter Email";
  }
  elseif($p_password == "")
  {
      $alert_danger = "Enter Password";
  }
  elseif($p_repassword == "")
  {
      $alert_danger = "Repeat Password";
  }
  elseif($p_password != $p_repassword)
  {
      $alert_danger = "Password Not Matched";
  }
  else
  {
      $d_old = explode("/",$p_dob);
      $p_dob = $d_old[2]."/".$d_old[0]."/".$d_old[1];

      $loc = $p_city."~".$p_address;
	 
		echo insert_data("insert into patient(patient_id,patient_name,patient_gender,patient_email,patient_phone,patient_dob,patient_address,patient_password,added_by) values('$p_id','$p_name','$p_gender','$p_email','$p_phone','$p_dob','$loc','$p_password','self')");
		
			header("LOCATION:patient_otp.php?id=$p_id&p_email=$p_email");
  }
}


?>

  <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/HMS.png">
  <link rel="icon" type="image/png" href="assets/img/HMS.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Rudani Hospital</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet"/>
    <link href="assets/css/snackbar.css"    rel="stylesheet"/>

</head>
<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>
<body class="index-page">
<!-- Navbar -->


<h2>Snackbar / Toast</h2>
<p>Snackbars are often used as a tooltips/popups to show a message at the bottom of the screen.</p>
<p>Click on the button to show the snackbar. It will disappear after 3 seconds.</p>

<button onclick="myFunction()">Show Snackbar</button>

<div id="snackbar">Some text some message..</div>

<script type="javascript">
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>


          
        <div class="section <?php theme("class_filter"); ?> section-signup" style="background-image: url('assets/img/HMS_BG.jpg'); background-size: cover;background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat; min-height: 700px;">



      <div class="container">



        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="card card-signup " >
              <form class="form" method=POST>
                <div class=" header  text-center <?php theme("class_header"); ?>" >
                  <h4>Signup</h4>
<?php
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
?>
                </div>
                
                <div class="content">
                  
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">vpn_key</i>
                    </span>
                    <div class="form-group label-floating">
                <label class="control-label">Patient's Id</label>
                    <input type="text" name=p_id value="<?php echo key_engine("patient"); ?>" class="form-control" disabled>

                    
                  </div>
                  </div>
                

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">account_circle</i>
                    </span>
                    <div class="form-group label-floating">
                <label class="control-label">Patient's Name</label>
                    <input type="text" name="p_name" value="<?php if(isset($p_name)){ echo $p_name; }?>" class="form-control" id="validation_name">
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

                  <div class="input-group ">
                    <span class="input-group-addon">
                      <i class="material-icons">email</i>
                    </span>
                  <div class="form-group label-floating">
                <label class="control-label">Patient's Email</label>
                <input type="email" name="p_email" value="<?php if(isset($p_email)){ echo $p_email; }?>" class="form-control" id='patient_email' >
              </div>
            </div>

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">lock_outline</i>
                    </span>
                    <div class="form-group label-floating">
                <label class="control-label">Password</label>
                    <input type="text" name="p_password" value="<?php if(isset($p_password)){ echo $p_password; }?>" class="form-control" />
                  </div>
                  </div>   

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">cached</i>
                    </span>
                    <div class="form-group label-floating">
                <label class="control-label">Re-enter Password</label>
                    <input type="text" name="p_repassword" value="<?php if(isset($p_repassword)){ echo $p_repassword; }?>" class="form-control" />
                  </div>
                  </div> 

                </div>
                <div class="footer text-center">
                  
                    <input type="submit" name="signup" value="Signup" class="btn <?php theme("class_btn"); ?> btn-round " />
                    <br><br>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
        

</body>
  <!--   Core JS Files   -->
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js"></script>
	<script src="assets/js/email_validation.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/nouislider.min.js" type="text/javascript"></script>

  <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
  <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

  <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
  <script src="assets/js/material-kit.js" type="text/javascript"></script>

<!--Validation-->
<script src="assets/js/validation.js" type="text/javascript"></script>
  <script type="text/javascript">


    $().ready(function(){
      // the body of this function is in assets/material-kit.js
      materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

        $(window).on('scroll', materialKitDemo.checkScrollForParallax);
      }

    });
  </script>

  

</html>
