<?php 
include("assets/modules/global_module.php");
include("assets/modules/theme.php");
check_token("admin");

if(isset($_POST["ward"]))
{
	$ward_id = $_POST["ward"];
}

$result = fetch_data("select * from bed where ward_id = '$ward_id' and bed_status = 0","result");

if($result && mysqli_num_rows($result) != 0)
{
    echo "<option  selected>--Choose Bed--</option>";
	while( $data = mysqli_fetch_array($result))
    {
		echo "<option>$data[0]</option>";
    }

}
else
{
	echo "<option>No Beds Availbale</option>";
}


?>