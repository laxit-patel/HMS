<?php 
include("assets/modules/global_module.php");
include("assets/modules/theme.php");
check_token("admin");

if(isset($_POST["ward"]))
{
	$ward_id = $_POST["ward"];
}

$result = fetch_data("select * from bed where ward_id = '$ward_id' ","result");

if($result && mysqli_num_rows($result) != 0)
{	echo "<div class='container-fluid text-center'>";
	while( $data = mysqli_fetch_array($result))
    {
		echo "<div class='btn btn-primary id='ward_button'>".$data[0]."</div>";
    }
	echo "</div>";
}
else
{
	echo "<p >No Beds Availbale</p>";
}


?>