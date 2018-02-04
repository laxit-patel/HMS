<?php
include("assets/modules/global_module.php");
check_token("admin");

if(isset($_POST["doctor"])) {
    $doctor = $_POST["doctor"];
    slot_generator($doctor);
}