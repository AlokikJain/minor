<?php
session_start(); 
//require_once("pages/layout.php");

// Checking the login status of user
if(empty($_SESSION['id']))
{
	echo "<script>window.location.replace('login.php');</script>";
	
	//echo "<script>location.href='login.php';</script>";
	exit;
}

// on successful login

//renderPage("pdetails"); not working☻
require_once("pages/header.php");
require_once("pages/pdetails.php");
require_once("pages/footer.php");

?>