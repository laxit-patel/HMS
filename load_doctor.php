<?php
include("assets/modules/global_module.php");
check_token("admin");

$designation =  $_POST["designation"];

$result = fetch_data("select * from doctor where doctor_designation = '$designation' and doctor_exist = 0 ","result");
if(mysqli_num_rows($result) != 0)
{
   while( $data = mysqli_fetch_array($result))
    {
        echo "<option value='". $data[0] ."' >".$data[1]."</option>";
    }
}
else
{
    echo "<option disabled>No Doctor Available</option>";
}
?>