<?php
include("assets/modules/db_config.php"); // include database for $conn variable
include("assets/modules/global_module.php"); // include global module for key_engine() function

if(isset($_GET["ward_id"]))
{
	$id = $_GET["ward_id"];
}


$bed_id = key_engine("bed");
$sql = "insert into bed(bed_id,ward_id) value('$bed_id','$id')";

$result = mysqli_query($conn,$sql);

if($result)
{
	header("LOCATION:view_ward.php?ward_id=$id&msg_t='Bed Added'");
}
else
{
	header("LOCATION:view_ward.php?ward_id=$id&msg_f='Bed Not Added'");
}
?>