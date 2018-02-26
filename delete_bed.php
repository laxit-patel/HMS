<?php
include("assets/modules/global_module.php");
check_token("admin");

if(isset($_GET["b_id"]) && isset($_GET["ward_id"]))
{
	$bed_id = $_GET["b_id"];
	$ward_id = $_GET["ward_id"];
}

echo $bed_id;
echo "<br>".$ward_id;


if(delete_bed($bed_id))
{
	$msg = "Bed Deleted";
    header("LOCATION:view_ward.php?ward_id=$ward_id&msg_t=$msg");
}
else
{
    $msg = "Bed Not Deleted";
    header("LOCATION:view_ward.php?ward_id=$ward_id&msg_f=$msg");
}