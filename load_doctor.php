<?php
include("assets/modules/global_module.php");
check_token("admin");

$designation =  $_POST["designation"];

$result = fetch_data("select doctor_name from doctor where doctor_designation = '$designation'","result");
if($result)
{
   while( $data = mysqli_fetch_array($result))
    {
        echo "<option>".$data[0]."</option>";
    }
}
else
{
    echo 'No Doctor Available for $designation';
}
?>