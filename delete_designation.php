<?php
include("assets/modules/global_module.php");
check_token("admin");

if(isset($_GET["id"]))
{
    $des_id = $_GET["id"];

}
if(delete_designation($des_id))
{
    setcookie("alert_true","Designation Deleted",time() + (10 * 365 * 24 * 60 * 60));
    header("LOCATION:designation.php");
}
else
{
     setcookie("alert_false","Designation Not Deleted",time() + (10 * 365 * 24 * 60 * 60));
    header("LOCATION:designation.php");
}

?>