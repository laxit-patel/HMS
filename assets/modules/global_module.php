<?php

function key_engine($for)
{
	include("assets/modules/db_config.php"); // include database for $conn variable

	if($for == "patient")
	{
		$key = $for."_id";
		$sql_test = "select $key from $for order by count desc limit 1"; 
		$result_test = mysqli_query($conn,$sql_test);
		
		if($result_test)
		{
			$row=mysqli_fetch_row($result_test); //$row gets the key_val array
			
			$data = explode("_",$row[0]); // key_val explodes and saved in $data

			$year = $data[0];
			$initial = $data[1];
			$number = $data[2];

			$year_new = date("y");

			$number_new = $number+1;

			$key = $year_new."_".$initial."_".$number_new;
			
			return $key;
		}	
		else
		{
			return ";_;";
		}
	}
	elseif($for == "doctor")
	{
		$key = $for."_id";
		$sql_test = "select $key from $for order by count desc limit 1"; 
		$result_test = mysqli_query($conn,$sql_test);

		if($result_test)
		{
			$row=mysqli_fetch_row($result_test); //$row gets the key_val array
			
			$data = explode("_",$row[0]); // key_val explodes and saved in $data

			$year = $data[0];
			$initial = $data[1];
			$number = $data[2];

			$year_new = date("y");

			$number_new = $number+1;

			$key = $year_new."_".$initial."_".$number_new;

			echo "<br>".$key;

			die;
			
			return $key;
		}	
		else
		{
			return ";_;";
		}

	}


}

function insert_data($query)
{
	include("assets/modules/db_config.php"); // include database for $conn variable
	$result = mysqli_query($conn,$query);
	if($result)
	{
		return "Success";
	}
	else
	{
		return "Error";
	}	
}

function fetch_data($query,$type)
{
	include("assets/modules/db_config.php"); // include database for $conn variable
	$result = mysqli_query($conn,$query);
	if($result)
	{
		if($type == "login")
		{
		$count = mysqli_num_rows($result);
			if($count == 1)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		elseif($type == "count")
		{
			$count = mysqli_num_rows($result);
			return $count;
		}
		elseif($type == "result")
		{

			return $result;
		}
	}
	else
	{
		return "Fetch Error";
	}
}

function check_token($for)
{
	session_start();
if($for == "patient")
{
	if(isset($_SESSION["login_token"]) && isset($_COOKIE["login_token"]))
	{
	}
	else
	{
		header("LOCATION:patient_login.php");
	}
}
elseif($for == "admin")
{
	if(isset($_SESSION["admin_token"]) && isset($_COOKIE["admin_token"]))
	{
	}
	else
	{
		header("LOCATION:master_login.php");
	}
}

}

function master_login($role,$email,$pass)
{
	include("assets/modules/db_config.php");
	session_start();
	if($role == "Adminstrator")
	{
		$sql = "select * from admin where admin_name = '$email' and admin_password = '$pass'";
		
		$result = mysqli_query($conn,$sql);
	if($result)
	{
		$count = mysqli_num_rows($result);
			if($count == 1)
			{
				$data = mysqli_fetch_array($result);
				$id = $data[0];
				$_SESSION["admin_token"] = $data[0];
				setcookie("admin_token", $data[0], time() + (86400 * 120));
				header("LOCATION:dashboard_admn.php?id=$id");
			}
	}
	}	
	
}

?>



