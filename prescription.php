<?php

// this 'if' make sure that on ajax call to this file following html won't interfere on return data
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	require_once("pages/layout.php");
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

