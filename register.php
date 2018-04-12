<?php
require_once("pages/layout.php");

// logged in user try to access this page
if (!empty($_SESSION['id']))
{
	echo "<script>location.href='index.php';</script>";
	exit;
}

// display the registeration page
renderPage("register");

/**
 Authenticating the user
 */
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	// https://www.w3schools.com/php/php_form_validation.asp
	// sanatizing the input
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$name = test_input($_POST["name"]);
	$pwd = htmlspecialchars($_POST["pwd"]);
	$number = test_input($_POST["number"]);
	$email = test_input($_POST["email"]);
	$regId = test_input($_POST["Rid"]);
	
	require("dbconfig.php");

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// saving it to db  "SQL INJECTION PRONE!"
    $sql = 'INSERT INTO doctor (name, email, number, regId, password) VALUES ("'.$name.'","' .$email.'","' .$number.'","' .$regId.'","' .$pwd.'")';
    if ($conn->query($sql)) {
    	$last_id = mysqli_insert_id($conn);
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// all goes well then
	mysqli_close($conn);
	$_SESSION['id'] = $last_id;
	$_SESSION['name'] = $name;
	echo "<script>location.href='index.php';</script>";
}
?>