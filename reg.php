<?php
$name=$_POST['email'];
$pwd=$_POST['pwd'];
$mobile=$_POST['mobile'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "INSERT INTO login (email,password,mobile) VALUES ('.$name.','.$pwd','.$mobile.')";

if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='Login.php'";
echo "</script>";
} else {
	echo "<script language='javascript' type='text/javascript'>";
echo "window.alert='EmailId Exist'";
echo "</script>";
}

$conn->close();
?>