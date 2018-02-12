<?php
session_start();

// Responding to ajax call
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$medicine = $_POST["medicine"];
	$dose = $_POST["dose"];
	$duration = $_POST["duration"];
	
	$patientName = $_SESSION['pname'];
	$patientNumber = $_SESSION['pcontact'];
	
	require("dbconfig.php");
	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO prescription (name, number, drugs) VALUES('". $patientName . "','" . $patientNumber . "','{" . json_encode($medicine). "}{".implode(",", $dose)."}{".implode(",", $duration)."}')";
	
	// saving it in database
	if (mysqli_query($conn, $sql)) {
    	$last_id = mysqli_insert_id($conn);
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// all goes well then
	mysqli_close($conn);
	
	// removing the patient details
	unset($_SESSION['pname']);
	unset($_SESSION['pcontact']);
	
	echo "voila!";
}

?>