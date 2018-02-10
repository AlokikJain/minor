<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// TODO: validate the inputs
	
	$_SESSION['patientName'] = $_POST['name'];
	$_SESSION['patientContact'] = $_POST['contact'];
	
	echo "<script>location.href='prescription.php';</script>";
}
	