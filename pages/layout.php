<?php 
/**
* this file is kind of a overhead but stil somehow ease the work ☻
* whenever the renderPage function is called it appends .php to the provided name,
* checks the file exists and fetch it along with header and footer to cover it
*/

// calling the following function, to access the SESSION variable
session_start(); 

// getting the header page
require("header.php");

/**
renders reuired the html page
*/

	function renderPage($template)
	{
		$path = $template . ".php";
		if(file_exists($path))
		{
			require($path);
			
			// getting the footer page
			require("footer.php");
		}
	}

?>