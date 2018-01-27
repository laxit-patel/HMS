<?php
include("assets/modules/global_module.php");
check_token("admin");

if(isset($_GET["id"]))
{
    $des_id = $_GET["id"];

}
if(delete_designation($des_id))
{

    header("LOCATION:designation.php");
}

?>