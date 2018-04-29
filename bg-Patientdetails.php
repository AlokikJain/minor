<?php

session_start();

// if the file is called from get method or simply url of this file is entered show them html
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	require_once("pages/header.php");
	require_once("pages/pdetails.php");
	require_once("pages/footer.php");
}

// if called to check the number or for registration via ajax call
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$_SESSION['pname'] = $_POST["name"];
	$_SESSION['pcontact'] = $_POST["contact"];

	require("dbconfig.php");

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// if the user click "next", checking whether the user records is there in database or not
	if (isset($_POST['next']))
	{
		// checks weather the user is registered or not
		$sql = 'SELECT Name,Phone FROM userinfo WHERE Phone LIKE"'. $_POST["contact"] . '" LIMIT 1';
		$result = $conn->query($sql);
		

		// if it exist no problem else insist them to register
		if ($result->num_rows > 0){
			$result = $result->fetch_assoc();
			$_SESSION['pname'] = $result['Name'];
			echo 1;		// it's there in record
		}
		else
			echo 0;		// patient not exists
	}
	else if (isset($_POST['register']))
	{	
		// echo "<script>alert('aagya re');</script>";
		// adding the new patient record to the database
		$sql = 'INSERT INTO userinfo (Name, EMail, Passw, Phone) VALUES ("' .$_POST['name']. '","' .$_POST['email']. '","' .$_POST['pwd'] . '","' . $_POST['contact']. '")';
		$conn->query($sql);

		// repeating just to ensure the details integrity
		$_SESSION['pname'] = $_POST["name"];
		$_SESSION['pcontact'] = $_POST["contact"];

		// once the user is registered, now prescribe them medicine!
		echo "<script>location.href='prescription.php';</script>";
	}

	// being good
	mysqli_close($conn);
}