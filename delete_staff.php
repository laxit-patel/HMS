<?php
include("assets/modules/global_module.php");
check_token("admin");
if(isset($_GET["delete_by"]) && isset($_GET["delete_for"]))
{
    $delete_by = $_GET["delete_by"];
    $delete_for = $_GET["delete_for"];
}
if(delete_staff($delete_by,$delete_for))
{
	$msg = "Stsff Deleted";
    header("LOCATION:view_staff.php?msg_t=$msg");
}
else
{
    $msg = "Staff Not Deleted";
    header("LOCATION:view_staff.php?msg_f=$msg");
}