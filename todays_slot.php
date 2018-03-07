<?php
include("assets/modules/global_module.php");
check_token("admin");

$slot =  $_POST["slot"];

$result = fetch_data("select * from appointment where appointment_slot = '$slot' and appointment_status = 1 and appointment_date = curdate()","result");
if(mysqli_num_rows($result) != 0)
{
   while( $data = mysqli_fetch_array($result))
    {
        $p_id = $data[2];
        $p_raw = mysqli_fetch_assoc($result_p = fetch_data("select patient_name from patient where patient_id = '$data[2]' ","result"));
        $p_name = $p_raw["patient_name"];
        $d_id = $data[1];
        $d_raw = mysqli_fetch_assoc($result_d = fetch_data("select doctor_name from doctor where doctor_id = '$d_id' ","result"));
        $d_name = $d_raw["doctor_name"];

        echo "<tr>";

        echo "<td>$d_name</td>";
        echo "<td>$p_name</td>";
        echo "</tr>";
    }
}
else
{echo "<tr><td>No Appointments $slot Slot</td></tr>";
}


?>