<?php
session_start();

// Responding to ajax call
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$medicine = $_POST["medicine"];
	$dose = $_POST["dose"];
	$duration = $_POST["duration"];

	$doctor = $_SESSION['name'];
	$patientName = $_SESSION['pname'];
	$patientNumber = $_SESSION['pcontact'];
	
	$date  = date("Y-m-d");
	
	require("dbconfig.php");
	// Create connection
	$con = new mysqli($host, $username, $password, $dbname);
	// Check connection
	if ($con->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// get the ID of user by the patient number
	$query1 = "SELECT _id FROM userinfo WHERE Phone =". $patientNumber;
	$result = $con->query($query1);
    $row = $result->fetch_assoc();
    $var1 = $row["_id"];

    // TODO : if the number is not registered(new user) , first add them to database
    
    // Store the record of patient visits
	$query2 = 'INSERT INTO user_pres(Userid,Date,Doctor) VALUES("' .$var1. '","'. $date. '","' . $doctor .'")';
	if ($con->query($query2) === FALSE) {
	    echo "Error2: " . $conn->error;
	}

	// get the last id from user_pres table
	$var2 =  mysqli_insert_id($con);
	
	// iteratively adding the medicines to the Medicines table
	for ($i = 0, $len = count($duration); $i < $len; $i++){
	    $query4 = 'INSERT INTO Medicines VALUES("' . $var2 .'","' .$medicine[$i] .'","'. $dose[$i] . '","' . $duration[$i] .'")';
	    if ($con->query($query4) === FALSE) {
	    echo "Error: " .  $conn->error;
		}
	}
	    
		// all goes well then
		mysqli_close($con);
		
		// removing the patient details
		unset($_SESSION['pname']);
		unset($_SESSION['pcontact']);
		
		echo "voila!";
	}

?>