<?php
include("assets/modules/global_module.php");
check_token("admin");

if(isset($_POST["email"]))
{
	$email = $_POST["email"];
}

echo $email;

echo "Yo";
?>