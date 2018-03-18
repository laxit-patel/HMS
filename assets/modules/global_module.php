<?php

function key_engine($for)
{
	include("assets/modules/db_config.php"); // include database for $conn variable

	if($for == "patient")
	{
		$key = $for."_id";
		
		$sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1"; 
		$result_test = mysqli_query($conn,$sql_test);
		
		if( mysqli_num_rows($result_test) != 0 )
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
           $year_new = date("y");
            $initial = $for;
            $number_new = 0;
			$initial = "ptnt";
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
		}
	}
	elseif($for == "doctor")
	{
		$key = $for."_id";
		$sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
		$result_test = mysqli_query($conn,$sql_test);

		if(mysqli_num_rows($result_test) != 0 )
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
            $year_new = date("y");
            $initial = $for;
            $number_new = 0;
			$initial = "dctr";
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
		}

	}
	elseif($for == "staff")
    {
        $key = $for."_id";
        $sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
        $result_test = mysqli_query($conn,$sql_test);

        if(mysqli_num_rows($result_test) != 0)
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
            $year_new = date("y");
            $initial = $for;
            $number_new = 0;
			$initial = "stff";
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
        }

    }
    elseif($for == "designation")
    {
        $key = $for."_id";
        $sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
        $result_test = mysqli_query($conn,$sql_test);

        if(mysqli_num_rows($result_test) != 0 )
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
              $year_new = date("y");
            $initial = $for;
            $number_new = 0;
			$initial = "dsgn";
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
        }

    }
    elseif($for == "slot")
    {
        $key = $for."_id";
        $sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
        $result_test = mysqli_query($conn,$sql_test);

        if(mysqli_num_rows($result_test) != 0 )
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
           $year_new = date("y");
            $initial = $for;
            $number_new = 0;
			$initial = "slot";
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
        }
    }
    elseif($for == "appointment")
    {
        $key = $for."_id";
        $sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
        $result_test = mysqli_query($conn,$sql_test);

        if(mysqli_num_rows($result_test) != 0 )
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
             $year_new = date("y");
            $initial = $for;
            $number_new = 0;
			$initial = "apmt";
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
        }
    }
    elseif($for == "ward")
    {
        $key = $for."_id";
        $sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
        $result_test = mysqli_query($conn,$sql_test);

        if(mysqli_num_rows($result_test) != 0 )
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
            $year_new = date("y");
            $initial = $for;
            $number_new = 0;
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
        }
    }
	 elseif($for == "bed")
    {
        $key = $for."_id";
		
        $sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
        $result_test = mysqli_query($conn,$sql_test);
		
        if(mysqli_num_rows($result_test) != 0 )
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
            $year_new = date("y");
            $initial = $for;
            $number_new = 0;
			$initial = "bedd";
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
        }
    }
     elseif($for == "admission") {
         $key = $for . "_id";

         $sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
         $result_test = mysqli_query($conn, $sql_test);

         if (mysqli_num_rows($result_test) != 0) {
             $row = mysqli_fetch_row($result_test); //$row gets the key_val array

             $data = explode("_", $row[0]); // key_val explodes and saved in $data

             $year = $data[0];
             $initial = $data[1];
             $number = $data[2];

             $year_new = date("y");

             $number_new = $number + 1;

             $key = $year_new . "_" . $initial . "_" . $number_new;

             return $key;
         } else {
             $year_new = date("y");
             $initial = $for;
             $number_new = 0;
             $initial = "adms";
             $key = $year_new . "_" . $initial . "_" . $number_new;

             return $key;
         }

     }
      elseif($for == "otps")
    {
        $key = $for."_id";

        $sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1";
        $result_test = mysqli_query($conn,$sql_test);

        if( mysqli_num_rows($result_test) != 0 )
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
            $year_new = date("y");
            $initial = $for;
            $number_new = 0;
			$initial = "otps";
            $key = $year_new."_".$initial."_".$number_new;

            return $key;
        }
    }
    else
    {
        return "Invalid Arguments";
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

function insert($query)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
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

			 $res = mysqli_query($conn,$query);
			 return $res;
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
elseif($for == "doctor")
{
    if(isset($_SESSION["doctor_token"]) && isset($_COOKIE["doctor_token"]))
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
	if($role == "Doctor")
    {
        $sql = "select * from doctor where doctor_email = '$email' and doctor_password = '$pass'";

        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $count = mysqli_num_rows($result);
                if($count == 1)
                {
                    $data = mysqli_fetch_array($result);
                    $id = $data[0];
                    $_SESSION["doctor_token"] = $data[0];
                    setcookie("doctor_token", $data[0], time() + (86400 * 120));
                    header("LOCATION:dashboard_doctor.php?id=$id");
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
        $query = "select * from patient where patient_exist = 0";
        $result = mysqli_query($conn,$query);

        if($result)
        {

            while($row = mysqli_fetch_array($result)) {
               
                $id = $row[0];
				$age = date_diff(date_create($row[5]), date_create('today'))->y;
                echo "<tr>
                <td>$id</td>
                <td>$row[1]</td>
                <td>$age</td>
				<td>$row[14]</td>
                <td > <a href='view_patient_profile.php?id=$id'> <i class='material-icons'>edit</i></a></td>
               
                </tr>";

            }

        }
		
    }
    elseif ($for == "doctor")
    {
        $query = "select * from doctor where doctor_exist = 0";
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

    elseif ($for == "designation")
    {
        $query = "select * from designation";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            echo "<tr>
                <td>$id</td>
                <td>$row[1]</td>
                <td > <a href='delete_designation.php?id=$id'> <i class='material-icons'>delete_forever</i></a></td>
               
                </tr>";

        }
    }
    elseif ($for == "appointment")
    {
        $query = "select * from appointment order by cast(substring(appointment_id,9) as int) desc";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
			$d_id = $row[1];
			$p_id = $row[2];
			$status = $row[5];
			if($status == 1)
            {
                $icon = "<i class='material-icons'>spellcheck</i>";
            }
            else
            {
                $icon = "<i class='material-icons'>text_format</i>";
            }

			$d_data = mysqli_fetch_assoc(mysqli_query($conn,"select doctor_name from doctor where doctor_id = '$d_id' "));
			
			$p_data = mysqli_fetch_assoc(mysqli_query($conn,"select patient_name from patient where patient_id = '$p_id' "));
			
            echo "<tr>
                <td>$id</td>
                <td>". $d_data['doctor_name'] ."</td>
                <td>". $p_data['patient_name'] ."</td>
                <td>$row[6]</td>
                <td > <a href='approve_appointment.php?app_id=$id'>  $icon </a></td>
               
                </tr>";

        }
    }
	elseif ($for == "staff")
    {
        $query = "select * from staff where staff_exist = 0 ";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            echo "<tr>
                <td>$id</td>
                <td>$row[1]</td>
                <td>$row[10]</td>
                <td>$row[3]</td>
                <td > <a href='view_staff_profile.php?id=$id'> <i class='material-icons'>edit</i></a></td>
               
                </tr>";

        }
    }
	elseif( $for == "ward")
	 {
        $query = "select * from ward where ward_exist = 0";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            echo "<tr>
                <td>$id</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td > <a href='view_ward.php?ward_id=$id'> <i class='material-icons'>edit</i></a></td>
                </tr>";

        }
    }
	elseif( $for == "bed")
	 {
        $query = "select * from bed where bed_exist = 0 ";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            echo "<tr>
                <td>$id</td>
                <td>$row[1]</td>
                <td > <a href='view_ward.php?id=$id'> <i class='material-icons'>edit</i></a></td>
                </tr>";

        }
    }
    elseif( $for == "admission")
	 {
        $query = "select * from admission where admission_status = 0 ";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
            $id = $row[0];
            $patient = mysqli_fetch_assoc(mysqli_query($conn,"select patient_name from patient where patient_id = '$row[1]'"));
            $staff = mysqli_fetch_assoc(mysqli_query($conn,"select staff_name from staff where staff_id = '$row[2]'"));
            $bed = mysqli_fetch_assoc(mysqli_query($conn,"select ward_id from bed where bed_id = '$row[3]'"));
            $ward_id = $bed["ward_id"];
            $ward = mysqli_fetch_assoc(mysqli_query($conn,"select ward_name from ward where ward_id = '$ward_id'"));

            $p = $patient["patient_name"];
            $s = $staff["staff_name"];
            $w = $ward["ward_name"];

            echo "<tr>
                <td>$p</td>
                <td>$s</td>
                <td>$w</td>
                <td>$row[4]</td>
                <td > <a href='discharge_patient.php?admission_id=$row[0]&staff_id=$row[2]&patient_id=$row[1]&bed_id=$row[3]'> <i class='material-icons'>edit</i></a></td>
                </tr>";

        }
    }
	else
	{
		echo "<tr><td>Invalid Arguments</td></tr>";
	}


}

function update_data($query)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
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

function delete_patient($by,$for)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
    $del_by = $by;
    $result = mysqli_query($conn,"update patient set patient_exist = '1' where patient_id = '$for' ");
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function add_doctor($doc,$query)
{
    include("assets/modules/db_config.php");
		
    $result = mysqli_query($conn,$query);
    if($result)
    {
        $slot_key = key_engine("slot");
		$doc_key = $doc;
		if(add_slot($slot_key,$doc_key))
		{
			return true;
		}
    }
    else
    {
        return false;
    }
}

function delete_doctor($by,$for)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
    $del_by = $by;
    $result = mysqli_query($conn,"update doctor set doctor_exist = 1 where doctor_id = '$for'");
    if($result)
    {
        $slot_del = mysqli_query($conn,"update slot set slot_exist = 1 where doctor_id='$for'");
        if($slot_del)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}

function delete_staff($by,$for)
{
	 include("assets/modules/db_config.php"); // include database for $conn variable
    $del_by = $by;
	 $result = mysqli_query($conn,"update staff set staff_exist = 1 where staff_id = '$for'");
	 if($result)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
}

function add_designation($query)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
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
function delete_designation($id)
{
    include("assets/modules/db_config.php"); // include database for $conn variable

    $result = mysqli_query($conn,"delete from designation where designation_id = '$id'");
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function slot_generator($doctor)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
    $result = mysqli_query($conn,"select * from slot where doctor_id = '$doctor' " );
    $row = mysqli_fetch_assoc($result);
    $doc_data = mysqli_fetch_assoc(mysqli_query($conn,"select doctor_name from doctor where doctor_id = '$doctor' "));
    $doc_name = $doc_data["doctor_name"];

    $s1 = $row['s1'];
    $s2 = $row['s2'];
    $s3 = $row['s3'];
    $s4 = $row['s4'];
    $s5 = $row['s5'];
    $s6 = $row['s6'];
    $s7 = $row['s7'];
    $s8 = $row['s8'];

    echo "<div class='container-fluid text-center'><h3>Book $doc_name</h3>";
    echo "<div class='row'>";
            if(!$s1 == 1)
            {
             echo "<div class='col-md-3'><div class='btn btn-success' id='slot-btn'>08-09</div></div>";
            }
            else
            {
                echo "<div class='col-md-3'><div class='btn btn-danger' disabled>08-09</div></div>";
            }
            if(!$s2 == 1)
            {
                echo "<div class='col-md-3'><div class='btn btn-success' id='slot-btn'>09-10</div></div>";
            }
            else
            {
                echo "<div class='col-md-3'><div class='btn btn-danger' disabled>09-10</div></div>";
            }
            if(!$s3 == 1)
            {
                echo "<div class='col-md-3'><div class='btn btn-success' id='slot-btn'>10-11</div></div>";
            }
            else
            {
                echo "<div class='col-md-3'><div class='btn btn-danger' disabled>10-11</div></div>";
            }
            if(!$s4 == 1)
            {
                echo "<div class='col-md-3'><div class='btn btn-success' id='slot-btn'>11-12</div></div>";
            }
            else
            {
                echo "<div class='col-md-3'><div class='btn btn-danger' disabled>11-12</div></div>";
            }
    echo "</div><div class='row'>";

            if(!$s5 == 1)
            {
                echo "<div class='col-md-3'><div class='btn btn-success' id='slot-btn'>01-02</div></div>";
            }
            else
            {
                echo "<div class='col-md-3'><div class='btn btn-danger' disabled>01-02</div></div>";
            }
            if(!$s6 == 1)
            {
                echo "<div class='col-md-3'><div class='btn btn-success' id='slot-btn'>02-03</div></div>";
            }
            else
            {
                echo "<div class='col-md-3'><div class='btn btn-danger' disabled>02-03</div></div>";
            }
            if(!$s7 == 1)
            {
                echo "<div class='col-md-3'><div class='btn btn-success' id='slot-btn'>03-04</div></div>";
            }
            else
            {
                echo "<div class='col-md-3'><div class='btn btn-danger' disabled>03-04</div></div>";
            }
            if(!$s8 == 1)
            {
                echo "<div class='col-md-3'><div class='btn btn-success' id='slot-btn'>04-05</div></div>";
            }
            else
            {
                echo "<div class='col-md-3'><div class='btn btn-danger' disabled>04-05</div></div>";
            }

echo "</div></div>  <script src='../js/load_final_slot.js'></script>";
}

function add_slot($slot,$doctor)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
    $query = "insert into slot(slot_id,doctor_id) values('$slot','$doctor')";
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
function book_slot($slot,$doctor)
{
    include("assets/modules/db_config.php"); // include database for $conn variable

    if($slot == "08-09")
    {
        $sl = "s1";
    }
    elseif($slot == "09-10")
    {
        $sl = "s2";
    }
    elseif($slot == "10-11")
    {
        $sl = "s3";
    }
    elseif($slot == "11-12")
    {
        $sl = "s4";
    }
    elseif($slot == "01-02")
    {
        $sl = "s5";
    }
    elseif($slot == "02-03")
    {
        $sl = "s6";
    }
    elseif($slot == "03-04")
    {
        $sl = "s7";
    }
    elseif($slot == "04-05")
    {
        $sl = "s8";
    }

    $query = "update slot set $sl = 1 where doctor_id = '$doctor'";
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

function menu($user,$active,$sub_active)
{

    //creating theme variable

     if ($_COOKIE["theme"] == 'Professional')
         {
             $theme = "sidebar-professional";
         }
        elseif($_COOKIE["theme"] == 'Casual')
        {
           $theme = "sidebar-casual";
        }
         else
        {
            $theme = "";
        }



    //theme variable ends

   echo "<link href='assets/css/demo.css' rel='stylesheet'><div class='sidebar '  >
        <div class='sidebar-wrapper  $theme' >";

    echo "<div class='logo'>
                <a href='#' class='simple-text'>";
                    if(isset($user)){echo $user;};
                echo "</a>
            </div>";

    echo "<ul class='nav' >

                <li "; if($active == "dashboard"){ echo "class=active"; } echo ">
                    <a href='dashboard_admn.php'>
                        <i class='pe-7s-graph'></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li "; if($active == "patient"){ echo"class=active"; } echo ">
                    <a href='add_patient.php' >
                        <i class='pe-7s-user'></i>
                        <p>Patient</p>
                    </a>";

                        if($active == "patient") {
                            echo "<ul>";

                            echo "<li ";
                            if ($sub_active == "add_patient") {
                                echo "class=active";
                            }
                            echo ">
                                                    <a href = 'add_patient.php' >
                                                        <i class='pe-7s-add-user' ></i >
                                                        <p > Add Patient </p >
                                                    </a >
                                                </li >";

                            echo "<li ";
                            if ($sub_active == "view_patient") {
                                echo "class=active";
                            }
                            echo ">
                                                    <a href = 'view_patient.php' >
                                                        <i class='pe-7s-search' ></i >
                                                        <p > View Patient </p >
                                                    </a >
                                                </li >";
												
							 echo "<li ";
                            if ($sub_active == "admit_patient") {
                                echo "class=active";
                            }
                            echo ">
                                                    <a href = 'admit_patient.php' >
                                                        <i class='pe-7s-paperclip' ></i >
                                                        <p > Admit Patient </p >
                                                    </a >
                                                </li >";

                            echo "<li ";
                            if ($sub_active == "discharge_patient") {
                                echo "class=active";
                            }
                            echo ">
                                                    <a href = 'discharge.php' >
                                                        <i class='pe-7s-back' ></i >
                                                        <p > Discharge Patient </p >
                                                    </a >
                                                </li >";

                            echo "</ul>";
                        }
                echo "</li >
                
                <li "; if($active == "appointment"){ echo"class=active"; } echo ">
                    <a href='add_appointment.php'>
                        <i class='pe-7s-note2'></i>
                        <p>Appointment</p>
                    </a>";

                        if($active == "appointment") {
                            echo "<ul>";

                            echo "<li ";
                            if ($sub_active == "add_appointment") {
                                echo "class=active";
                            }
                            echo ">
                                <a href = 'add_appointment.php' >
                                    <i class='pe-7s-add-user' ></i >
                                    <p > Add Appointment </p >
                                </a >
                            </li >";

                            echo "<li ";
                            if ($sub_active == "view_appointment") {
                                echo "class=active";
                            }
                            echo ">
                                <a href = 'view_appointment.php' >
                                    <i class='pe-7s-search' ></i >
                                    <p > view Appointment </p >
                                </a >
                            </li >";

                            echo "<li ";
                            if ($sub_active == "today_appointment") {
                                echo "class=active";
                            }
                            echo ">
                                <a href = 'today_appointment.php' >
                                    <i class='pe-7s-date' ></i >
                                    <p > Today's Appointment </p >
                                </a >
                            </li >";



        echo "</ul>";
    }

                echo "</li>

                <li "; if($active == "doctor"){ echo"class=active"; } echo ">
                    <a href='add_doctor.php'>
                        <i class='pe-7s-id'></i>
                        <p>Doctor</p>
                    </a>";

                        if($active == "doctor") {
                            echo "<ul>";

                            echo "<li ";
                            if ($sub_active == "add_doctor") {
                                echo "class=active";
                            }
                            echo ">
                                    <a href = 'add_doctor.php' >
                                        <i class='pe-7s-add-user' ></i >
                                        <p > Add Doctor </p >
                                    </a >
                                </li >";

                            echo "<li ";
                            if ($sub_active == "view_doctor") {
                                echo "class=active";
                            }
                            echo ">
                                    <a href = 'view_doctor.php' >
                                        <i class='pe-7s-search' ></i >
                                        <p > view Doctor </p >
                                    </a >
                                </li >";

                            echo "</ul>";
                        }

                echo "</li>

                <li "; if($active == "staff"){ echo"class=active"; } echo ">
                    <a href='add_staff.php'>
                        <i class='pe-7s-users'></i>
                        <p>Staff</p>
                    </a>";

                        if($active == "staff") {
                            echo "<ul>";

                            echo "<li ";
                            if ($sub_active == "add_staff") {
                                echo "class=active";
                            }
                            echo ">
                                    <a href = 'add_staff.php' >
                                        <i class='pe-7s-add-user' ></i >
                                        <p > Add Staff </p >
                                    </a >
                                </li >";

                            echo "<li ";
                            if ($sub_active == "view_staff") {
                                echo "class=active";
                            }
                            echo ">
                                    <a href = 'view_staff.php' >
                                        <i class='pe-7s-search' ></i >
                                        <p > view Staff </p >
                                    </a >
                                </li >";

                            echo "</ul>";
                        }

                echo "</li>

                <li "; if($active == "setting"){ echo"class=active"; } echo ">
                    <a href='designation.php'>
                        <i class='pe-7s-edit'></i>
                        <p>Setting</p>
                    </a>";
                            if($active == "setting") {
                                echo "<ul>";

                                echo "<li ";
                                if ($sub_active == "designation") {
                                    echo "class=active";
                                }
                                echo ">
                                <a href = 'designation.php' >
                                    <i class='pe-7s-add-user' ></i >
                                    <p > Add Designation </p >
                                </a >
                            </li >";

                                echo "<li ";
                                if ($sub_active == "ward") {
                                    echo "class=active";
                                }
                                echo ">
                                <a href = 'add_ward.php' >
                                    <i class='pe-7s-search' ></i >
                                    <p > Add Ward </p >
                                </a >
                            </li >";

                                echo "<li ";
                                if ($sub_active == "report") {
                                    echo "class=active";
                                }
                                echo ">
                                <a href = 'report.php' >
                                    <i class='pe-7s-news-paper' ></i >
                                    <p > Report </p >
                                </a >
                            </li >";

                                echo "</ul>";
                            }
                echo "</li>";

          echo "</ul>";

    echo "</div>
    </div>";

}

function doctor_menu($user,$active,$sub_active)
{

    //creating theme variable

     if ($_COOKIE["theme"] == 'Professional')
         {
             $theme = "sidebar-professional";
         }
        elseif($_COOKIE["theme"] == 'Casual')
        {
           $theme = "sidebar-casual";
        }
         else
        {
            $theme = "";
        }



    //theme variable ends

   echo "<link href='assets/css/demo.css' rel='stylesheet'><div class='sidebar '  >
        <div class='sidebar-wrapper  $theme' >";

    echo "<div class='logo'>
                <a href='#' class='simple-text'>";
                    if(isset($user)){echo $user;};
                echo "</a>
            </div>";

    echo "<ul class='nav' >

                <li "; if($active == "dashboard_doctor"){ echo "class=active"; } echo ">
                    <a href='dashboard_doctor.php'>
                        <i class='pe-7s-graph'></i>
                        <p>Dashboard</p>
                    </a>
                </li>";




          echo "</ul>";

    echo "</div>
    </div>";

}

function generate_bed($ward_id,$ward_bed)
{
	 include("assets/modules/db_config.php"); // include database for $conn variable
	 $bed_id = key_engine('bed');
	 for($i=1;$i<=$ward_bed;$i++)
	 {
		 echo "Before".$bed_id;
	 $sql = "insert into bed(bed_id,ward_id) values('$bed_id','$ward_id')";
	 $result = mysqli_query($conn,$sql);
	 if(!$result)
	 {
		 $flag = 1;
	 }
	  $bed_id = key_engine('bed');
	   echo "After".$bed_id."<br>";
	 }
	 
	 if(isset($flag))
	 {
		 return false;
	 }
	 else
	 {
		 return true;
	 }
	 
}

function view_filtered_table($id)
{
	 include("assets/modules/db_config.php"); // include database for $conn variable
	$data = explode("_",$id);
	$for = $data[1];
	
	if($for == "ward")
	{
	 $query = "select * from bed where ward_id = '$id' and bed_exist = 0 ";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
            $b_id = $row[0];
            echo "<tr>
                <td>$id</td>
                <td>$b_id</td>
                <td > <a href='delete_bed.php?b_id=$b_id&ward_id=$id'> <i class='material-icons'>delete</i></a></td>
                </tr>";

        }
	}
	else
	{
		echo "<td>Invalid Arguments</td>";
	}
}

function avatar_generator($age,$gender)
{
	$avatar = "";
	
	if($gender == "Male")
	{
		$avatar .= "man-";
	}
	elseif($gender == "Female")
	{
		$avatar .= "woman-";
	}
	
	if($age <= 22)
	{
		$avatar .= "22";
	}
	elseif($age > 22 && $age <= 24)
	{
		$avatar .= "24";
	}
	elseif($age > 24 && $age <= 26)
	{
		$avatar .= "26";
	}
	elseif($age > 26 && $age <= 28)
	{
		$avatar .= "28";
	}
	elseif($age > 28 && $age <= 30)
	{
		$avatar .= "30";
	}
	elseif($age > 30 && $age <= 32)
	{
		$avatar .= "32";
	}
	elseif($age > 32 && $age <= 34)
	{
		$avatar .= "34";
	}
	elseif($age > 34 && $age <= 36)
	{
		$avatar .= "36";
	}
	elseif($age > 36 && $age <= 38)
	{
		$avatar .= "38";
	}
	elseif($age > 38 && $age <= 40)
	{
		$avatar .= "40";
	}
	elseif($age > 40 && $age <= 42)
	{
		$avatar .= "42";
	}
	elseif($age > 42 && $age <= 44)
	{
		$avatar .= "44";
	}
	elseif($age > 44 && $age <= 46)
	{
		$avatar .= "46";
	}
	elseif($age > 46 && $age <= 48 )
	{
		$avatar .= "48";
	}
	else
	{
		$avatar .= "48";
	}
	
	echo $avatar;
}

function delete_bed($bed)
{
	include("assets/modules/db_config.php"); // include database for $conn variable
	$query = "update bed set bed_exist = 1 where bed_id = '$bed' ";
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

function delete_ward($ward_id)
{
	include("assets/modules/db_config.php"); // include database for $conn variable
	$query = "update ward set ward_exist = 1 where ward_id = '$ward_id' ";
	$result = mysqli_query($conn,$query);
	echo $ward_id;
	
	if($result)
	{
		$b_query = "update bed set bed_exist = 1 where ward_id = '$ward_id' ";
		$b_result = mysqli_query($conn,$b_query);
		if($b_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

function admission($query)
{
    include("assets/modules/db_config.php"); // include database for $conn variable
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


function alter_capacity($mode,$staff,$interval)
{
     include("assets/modules/db_config.php"); // include database for $conn variable
    $get_query = "select staff_capacity from staff where staff_id = '$staff'";
    $get_result = mysqli_query($conn,$get_query);
    if($get_result)
    {
        if($mode == "-")
        {
            $capacity = mysqli_fetch_assoc($get_result);
    $new_capacity = $capacity["staff_capacity"] - $interval;
    $put_query = "update staff set staff_capacity = $new_capacity";
    $put_result = mysqli_query($conn,$put_query);
        if($put_result)
        {
           return true;
        }
        else
        {
            return false;
        }
        }
        else
        {
            $capacity = mysqli_fetch_assoc($get_result);
    $new_capacity = $capacity["staff_capacity"] + $interval;
    $put_query = "update staff set staff_capacity = $new_capacity";
    $put_result = mysqli_query($conn,$put_query);
        if($put_result)
        {
           return true;
        }
        else
        {
            return false;
        }
        }
    }
    else
    {
        return false;
    }

}

function generate_otp($id)
{
     include("assets/modules/db_config.php"); // include database for $conn variable
    $check_query = "select count(*) from otps where otps_for = $'$id'";
    $check_result = mysqli_query($conn,$check_query);
    $count = mysqli_fetch_array($check_result);
    echo $count[0];
    echo $id;
   if($count[0] == 0)
   {
          echo "OTP Is Unique";
   }
   else
   {
       echo "Otp Already Exist";
   }

}

?>



