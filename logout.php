<?php
include("assets/modules/global_module.php"); 


if(isset($_GET["for"]))
{
	$for = $_GET["for"];
}	
$data = explode("_",$for); 
$initial = $data[1];
	
if($initial == "ptnt")
{
	session_destroy();
	setcookie("login_token","",time()-3600);
	header("LOCATION:patient_login.php");
}
elseif($initial == "admn")
{
	session_destroy();
	setcookie("admin_token","",time()-3600);
	header("LOCATION:master_login.php");
}
elseif($initial == "dctr")
{
    session_destroy();
    setcookie("doctor_token","",time()-3600);
    header("LOCATION:master_login.php");
}



?>