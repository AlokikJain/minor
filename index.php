<?php
/*
* ultimate work of this file is to throw html to client
*/

//session_start(); 
require_once("pages/layout.php");


renderPage("index"); 
//require_once("pages/header.php");
//require_once("pages/index.php");

// adding explicitly for modal to work properly
require_once("pages/login.php");

?>