<?php 
session_start(); 

// getting the header page
require("header.php");

/**
renders reuired the html page
*/

	function renderPage($template, $data = [])
	{
		$path = $template . ".php";
		if(file_exists($path))
		{
			extract($data);
			require($path);
			
			// getting the footer page
			require("footer.php");
		}
	}

?>
