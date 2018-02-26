<?php
include("assets/modules/global_module.php");
check_token("admin");

if(isset($_GET["ward_id"]))
{
	$ward_id = $_GET["ward_id"];
}



if(delete_ward($ward_id))
{
	$msg = "Ward Deleted";
    header("LOCATION:add_ward.php?msg_t=$msg#account");
}
else
{
    $msg = "Ward Not Deleted";
    header("LOCATION:add_ward.php?msg_f=$msg#account");
}