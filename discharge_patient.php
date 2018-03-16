<?php
include("assets/modules/global_module.php");
check_token("admin");

$patient = $_GET["patient_id"];
$bed = $_GET["bed_id"];
$staff = $_GET["staff_id"];
$admission = $_GET["admission_id"];

if(update_data("update patient set patient_type = 0, patient_status = 0 where patient_id = '$patient'"))
{
    if(alter_capacity("+",$staff,3))
    {
        if(update_data("update bed set patient_id = NULL,staff_id = NULL,bed_status = 0 where bed_id = '$bed'" ))
        {
            if(update_data("update admission set admission_status = 1 where admission_id = '$admission'"))
            {
                setcookie("alert_true","Patient Discharged",time() + (10 * 365 * 24 * 60 * 60));
         header("LOCATION:discharge.php");
            }
            else
            {
                setcookie("alert_false","Not Discharged",time() + (10 * 365 * 24 * 60 * 60));
         header("LOCATION:discharge.php");
            }
        }
        else
        {
            setcookie("alert_false","Bed Not Released",time() + (10 * 365 * 24 * 60 * 60));
         header("LOCATION:discharge.php");
        }
    }
    else
    {
        setcookie("alert_false","Capacity Not Restored",time() + (10 * 365 * 24 * 60 * 60));
         header("LOCATION:discharge.php");
    }
}
else
{
     setcookie("alert_false","Patient Not Released",time() + (10 * 365 * 24 * 60 * 60));
         header("LOCATION:discharge.php");
}