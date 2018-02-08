<?php
require_once("pages/layout.php");

// logged in user try to access this page
if (!empty($_SESSION['id']))
{
	echo "<script>location.href='index.php';</script>";
	exit;
}

// display the login page
renderPage("login");

/**
 Authenticating the user
 */
 
 // form is submitted to server
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	require("dbconfig.php");

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// https://www.w3schools.com/php/php_form_validation.asp
	// sanatizing the input
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// Querying the database
	$email = test_input($_POST["email"]);
	$pwd = htmlspecialchars($_POST["pwd"]);

	$sql = 'SELECT * FROM doctor where email = "'.$email. '" AND password = "'.$pwd.'"';
	$result = $conn->query($sql);

	// if the data is fake
	$data = $result->fetch_assoc();
	if (empty($data)){
		echo '<script language="javascript">';
       	echo 'window.alert("Invalid Username Or Password")';
       	echo '</script>';
	}

	// all goes well then
	$_SESSION['id'] = $data['regId'];
	$_SESSION['name'] = $data['name'];
	echo "<script>location.href='index.php';</script>";
}
?>