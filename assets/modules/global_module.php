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
		$sql_test = "select $key from $for order by $key desc limit 1";
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
	elseif($for == "receptionist")
    {
        $key = $for."_id";
        $sql_test = "select $key from $for order by $key desc limit 1";
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

function add_patient($query)
{
    include("assets/modules/db_config.php");

    $result = mysqli_query($conn,$query);
    if($result)
    {
       return true;
    }
    else
    {
        return false;
    }
}

function view_table($for)
{
    include("assets/modules/db_config.php");

    if($for == "patient")
    {
        $query = "select * from patient";
        $result = mysqli_query($conn,$query);

        if($result)
        {

            while($row = mysqli_fetch_array($result)) {
                $age = date_diff(date_create($row[6]), date_create('today'))->y;
                $id = $row[1];
                echo "<tr>
                <td>$id</td>
                <td>$row[2]</td>
              
                <td>$row[5]</td>
                <td>$age</td>
                <td > <a href='view_patient_profile.php?id=$id'> <i class='material-icons'>edit</i></a></td>
               
                </tr>";

            }

        }
    }
    elseif ($for == "doctor")
    {
        $query = "select * from doctor";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            echo "<tr>
                <td>$id</td>
                <td>$row[1]</td>
              
                <td>$row[7]</td>
                <td>$row[8]</td>
                <td > <a href='view_doctor_profile.php?id=$id'> <i class='material-icons'>edit</i></a></td>
               
                </tr>";

        }
    }
	elseif ($for == "receptionist")
    {
        $query = "select * from receptionist";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            echo "<tr>
                <td>$id</td>
                <td>$row[1]</td>
              
                <td>$row[7]</td>
                <td>$row[8]</td>
                <td > <a href='view_receptionist_profile.php?id=$id'> <i class='material-icons'>edit</i></a></td>
               
                </tr>";

        }
    }

}

function update_data($query)
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

function delete_patient($by,$for)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
    $del_by = $by;
    $result = mysqli_query($conn,"delete from patient where patient_id = '$for'");
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function add_doctor($query)
{
    include("assets/modules/db_config.php");

    $result = mysqli_query($conn,$query);
    if($result)
    {
        return true;
    }
    else
    {
        return mysqli_error($conn);
    }
}

function delete_doctor($by,$for)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
    $del_by = $by;
    $result = mysqli_query($conn,"delete from doctor where doctor_id = '$for'");
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function add_receptionist($query)
{
    include("assets/modules/db_config.php");

    $result = mysqli_query($conn,$query);
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function delete_receptionist($by,$for)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
    $del_by = $by;
    $result = mysqli_query($conn,"delete from receptionist where receptionist_id = '$for'");
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>



