<?php
include("assets/modules/global_module.php");

if(isset($_GET["app_id"]))
{
    $app_id = $_GET["app_id"];
}

$ap_result = fetch_data("select * from appointment where appointment_id = '$app_id' ","result");
$app_data = mysqli_fetch_assoc($ap_result);
$doc_id = $app_data["appointment_for"];
$doc_result = fetch_data("select doctor_id,doctor_name from doctor where doctor_id = '$doc_id' ","result");
$doc_data = mysqli_fetch_assoc($doc_result);



if(update_data("update appointment set appointment_status = 1 where appointment_id = '$app_id' "))
{
    setcookie("alert_true","Appointment Approved",time() + (10 * 365 * 24 * 60 * 60));
    header("LOCATION:view_appointment.php");
}
else
{
     setcookie("alert_false","Approval Error",time() + (10 * 365 * 24 * 60 * 60));
    header("LOCATION:view_appointment.php");
}
?>