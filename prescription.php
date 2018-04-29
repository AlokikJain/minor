<?php

// this 'if' make sure that on ajax call to this file following html won't interfere on return data
// if it is removed then along with the data you want to send, additional html will be also send
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	require_once("pages/layout.php");
	// if the user isn't signed in, throw them to login page
	if(empty($_SESSION['id']))
	{
		echo "<script>window.location.replace('login.php');</script>";
		exit;			// end the script
	}
	renderPage("prescription");
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	require("dbconfig.php");

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// search for the medicine that matches the user input
	$Name = $_POST['search'];
	$sql = 'SELECT id,Name FROM search WHERE Name LIKE"'.$Name. '%"';
	$result = $conn->query($sql);


	//Fetching result from database.
	$string = '';
	while($Result = $result->fetch_assoc()) {
		$string = $string . " <option id='" . $Result['id']. "'>". $Result['Name'] . "</option>";
	}
	echo $string;
}

?>

