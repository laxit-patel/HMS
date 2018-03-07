<?php
include("assets/modules/global_module.php");
check_token("admin");

$doctor =  $_POST["doctor"];


$result = fetch_data("select * from appointment where appointment_for = '$doctor' and appointment_status = 1 and appointment_date = curdate() ","result");
if(mysqli_num_rows($result) != 0)
{
   while( $data = mysqli_fetch_array($result))
    {
        $p_id = $data[2];
        $p_raw = mysqli_fetch_assoc($result_p = fetch_data("select patient_name from patient where patient_id = '$data[2]' ","result"));
        $p_name = $p_raw["patient_name"];
        //$a_raw = mysqli_fetch_assoc($result_a = fetch_data("select * from appointment where appointment_for","result"));

        echo "<tr>";

        echo "<td>$p_name</td>";
        echo "<td>$data[6]</td>";
        echo "</tr>";
    }
}
else
{
    echo "<tr><td>No Appointments For Today</td></tr>";
}

?>