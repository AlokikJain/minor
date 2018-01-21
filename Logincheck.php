
<?php

	// if someone is already logged in then redirect
	if (!empty($_SESSION['id'])){
		flash_message('OOPS!','Already logged in');
		echo "<script>location.href='Login.php';</script>";
	}

	// for the form's data processing
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// ensure user co-operated
		if(!empty($_POST['username'])&&!empty($_POST['password']))
		{
			/** ensure user is there in database  */

			require("dbconfig.php");

			// Create connection
			$conn = new mysqli($host, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			// https://www.w3schools.com/php/php_form_validation.asp
			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			$username = test_input($_POST["username"]);

			// Querying the database
			$username = $username;
			$password = crypt($_POST["password"], 50);

			$sql = 'SELECT * FROM users where uname = "'.$username. '" AND hash = "'.$password.'"';
			$result = $conn->query($sql);

			// if the data is fake
			$data = $result->fetch_assoc();
			if (empty($data)){
				echo '<script language="javascript">';
            	echo 'window.alert("Invalid Username Or Password")';
            	echo '</script>';
			}

			// all goes well then
			$_SESSION['id'] = $data['id'];
			$_SESSION['name'] = $data['uname'];
			echo "<script>location.href='index.php';</script>";
		}
		// if something goes invalid
        else
        {
			echo '<script language="javascript">';
            echo 'window.alert("Invalid Username Or Password")';
            echo '</script>';
        }
	}
?>